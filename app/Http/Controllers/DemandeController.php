<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Demande;
use Illuminate\Http\Request;
use App\Models\Beneficiaire;
use App\Models\DossierOrange;
use App\Models\Tuteur;
use App\Models\User;
use App\Models\DossierMedical;
use App\Models\EnqueteSociale;
use Dompdf\Dompdf;
use Dompdf\Options;

class DemandeController extends Controller
{

    //auth
   /* public function __construct()
    {
        $this->middleware('auth');  
    }*/


  
public function __construct()
{
    $this->middleware(function ($request, $next) {
        if (auth()->check()) {
            $userRole = auth()->user()->role;

            if ($userRole === 'directeur') {
                return $next($request);
            } elseif ($userRole === 'secretaire' && in_array($request->route()->getName(), ['create', 'index', 'show'])) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized.');
    });
}






    public function accepter(Request $request, $id)
    {
        $demande = Demande::findOrFail($id);

        // Vérifiez si l'état de la demande est "accepter"
        if (empty($demande->id_benf)) {
            // Créez un nouveau bénéficiaire avec le nom_prenom de la demande
            $beneficiaire = new Beneficiaire();
            $beneficiaire->nom_prenom = $demande->nom_prenom_enfant;
            $beneficiaire->save();

            // Créez un tuteur du beneficiaire
            $tuteur = new Tuteur();
            $tuteur->nom_prenom = $demande->nom_prenom;
            $tuteur->cin = $demande->CIN;
            $tuteur->id_benf = $beneficiaire->id;
            $tuteur->save();

            // Créez un  Dossier Orange du beneficiaire
            $dossierorange = new DossierOrange();
            $dossierorange->id_benef = $beneficiaire->id;
            $dossierorange->save();

            // Créez un  Dossier Medical du beneficiaire
            $dossiermedical = new DossierMedical();
            $dossiermedical->id_benef = $beneficiaire->id;
            $dossiermedical->save();

            // Mettez à jour la demande avec l'ID du bénéficiaire
            $demande->id_benf = $beneficiaire->id;
            $demande->etat = 'accepter';
            $demande->update();

            return redirect()->route('demande.index')->with('success', 'Demande acceptée avec succès.');
        }

        // Si l'état n'est pas "accepter", vous pouvez rediriger l'utilisateur ou afficher un message d'erreur.
        return redirect()->route('demande.index')->with('error', 'État de la demande invalide.');
    }

    //
    public function refuser(Request $request, $id)
    {
        $demande = Demande::findOrFail($id);

        // Vérifiez si l'état de la demande est "accepter"
        if (empty($demande->id_benf)) {
            // Mettez à jour la demande avec l'ID du bénéficiaire
            $demande->etat = 'refuser';
            $demande->update();

            return redirect()->route('demande.index')->with('success', 'Demande acceptée avec succès.');
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demande = Demande::latest()->paginate(5);
        return view('Demande.All', compact('demande'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Demande.Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_prenom' => 'required',
            'CIN' => 'required',
            'date_expiration' => 'required',
            'nom_prenom_enfant' => 'required',
            'adresse' => 'required',
            'nom_prenom_enfant' => 'required'
        ]);
        $input = $request->all();
        Demande::create($input);
        $derniereDemande = Demande::latest()->first();
        // Créez un nouveau bénéficiaire avec le nom_prenom de la demande
        $enqueteSociale = new EnqueteSociale();
        $enqueteSociale->nom_prenom = $derniereDemande->nom_prenom;
        $enqueteSociale->id_demande = $derniereDemande->id;
        $enqueteSociale->save();
        return redirect()->route('demande.index')->with('success', 'Demande ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        return view('Demande.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        return view('Demande.edit', compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'nom_prenom' => 'required',
            'CIN' => 'required',
            'date_expiration' => 'required',
            'nom_prenom_enfant' => 'required',
            'adresse' => 'required',
            'nom_prenom_enfant' => 'required'
        ]);
        $input = $request->all();
        $demande->update($input);
        return redirect()->route('demande.index')->with('success', 'Demande mis a jour avec succes ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return redirect()->route('demande.index')->with('success', 'Demande supprimer avec succes');
    }

    //pdf
    public function pdf($id_demande)
    {
        $demande = Demande::find($id_demande);

        // Récupérer les données nécessaires pour générer le reçu
        $data = [
            'demande' => $demande,
        ];

        // Générer le contenu HTML du reçu
        $html = view('pdf', $data)->render();

        // Instancier Dompdf avec les options de configuration
        $options = new \Dompdf\Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new \Dompdf\Dompdf($options);

        // Charger le contenu HTML
        $dompdf->loadHtml($html);

        // Rendre le contenu HTML en PDF
        $dompdf->render();

        // Générer le nom du fichier PDF
        $filename = 'demande_' . $id_demande . '.pdf';

        // Télécharger le fichier PDF
        return $dompdf->stream($filename);
    }
}
