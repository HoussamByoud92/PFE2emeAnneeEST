<?php

namespace App\Http\Controllers;

use App\Models\infraction;
use App\Models\Demande;
use App\Models\Beneficiaire;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    //auth
      
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



    public function index()
    {
        $nombreBeneficiaires = Beneficiaire::count();
        // Nombre total de demandes pour le mois en cours
        $moisEnCours = Carbon::now()->month;
        $nombreDemandes = Demande::whereMonth('created_at', $moisEnCours)->count();
        $nombreDemandesTraitees = Demande::whereNotNull('etat')->count();

        // Calcul du pourcentage d'augmentation ou de diminution des demandes par rapport au mois précédent
        $moisPrecedent = Carbon::now()->subMonth()->month;
        $nombreDemandesMoisPrecedent = Demande::whereMonth('created_at', $moisPrecedent)->count();

        if ($nombreDemandesMoisPrecedent != 0) {
            $pourcentageVariation = (($nombreDemandes - $nombreDemandesMoisPrecedent) / $nombreDemandesMoisPrecedent) * 100;
        } else {
            $pourcentageVariation = 0;
        }

        // Récupérer le dernier bénéficiaire et la date de son admission
        $dernierBeneficiaire = Beneficiaire::latest('created_at')->first();

        // Récupérer le bénéficiaire avec le plus grand nombre d'infractions
        $beneficiaireMaxInfractions = Beneficiaire::select('beneficiaire.id', 'beneficiaire.nom_prenom')
            ->join('infraction', 'infraction.id_benef', '=', 'beneficiaire.id')
            ->groupBy('beneficiaire.id', 'beneficiaire.nom_prenom')
            ->orderByRaw('COUNT(infraction.id_benef) DESC')
            ->first();

        // Récupérer le mois avec le plus grand nombre de bénéficiaires
        $moisMaxBeneficiaires = Beneficiaire::select(DB::raw('MONTH(created_at) as mois'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('count', 'desc')
            ->first();

        // Récupérer le mois avec le plus grand nombre de demandes
        $moisMaxDemandes = Demande::select(DB::raw('MONTH(created_at) as mois'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('count', 'desc')
            ->first();

        //Demande
        $demandes = Demande::whereNull('etat')->latest()->paginate(5);

        return view('Dashboard.index', compact('nombreBeneficiaires', 'nombreDemandes', 'nombreDemandesTraitees', 'demandes', 'pourcentageVariation', 'dernierBeneficiaire', 'beneficiaireMaxInfractions', 'moisMaxBeneficiaires', 'moisMaxDemandes'));
    }
}
