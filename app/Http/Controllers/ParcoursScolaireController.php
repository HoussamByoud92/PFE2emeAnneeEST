<?php

namespace App\Http\Controllers;

use App\Models\ParcoursScolaire;
use App\Models\Beneficiaire;
use Illuminate\Http\Request;

class ParcoursScolaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */

       
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creates($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        return view('ParcoursScolaire.Add', compact('beneficiaire'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        ParcoursScolaire::create($input);
        return redirect()->route('parcoursScolaire.show', $input['id_benef'])->with('success', 'Demande ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        $parcoursScolaire = ParcoursScolaire::where('id_benef', $id_benef)->paginate(5);
        return view('ParcoursScolaire.All', compact('parcoursScolaire', 'beneficiaire'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParcoursScolaire $parcoursScolaire)
    {
        $beneficiaire = Beneficiaire::findorfail($parcoursScolaire->beneficiaire->id);
        return view('ParcoursScolaire.edit', compact('parcoursScolaire', 'beneficiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParcoursScolaire $parcoursScolaire)
    {
        $input = $request->all();
        $parcoursScolaire->update($input);
        return redirect()->route('parcoursScolaire.show', $parcoursScolaire->id_benef)->with('success', 'parcoursScolaire mis a jour avec succes ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParcoursScolaire $parcoursScolaire)
    {
        $parcoursScolaire->delete();
        return redirect()->route('parcoursScolaire.show', $parcoursScolaire->id_benef)->with('success', 'dossier Medical supprimer avec succes');
    }
}
