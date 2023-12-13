<?php

namespace App\Http\Controllers;

use App\Models\ParcourScolaire;
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
        $parcoursScolaire = ParcourScolaire::latest()->paginate(5);
        return view('Parcours.All', compact('parcoursScolaire'))->with('i', (request()->input('page', 1) - 1) * 5);
    
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Parcours.Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_par' => 'required',
            'annee_sco' => 'required',
            'moy_s1' => 'required',
            'moy_s2' => 'required',
            'moy_ann' => 'required',
            'etablissement_sco' => 'required',
            'classe' => 'required',
        ]);
        $input = $request->all();
        ParcourScolaire::create($input);
        return redirect()->route('parcours.index')->with('success', 'Parcours ajouté avec succes');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(ParcourScolaire $parcour)
    {
        return view('Parcours.show', compact('parcour'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParcourScolaire $parcour)
    {
        return view('Parcours.edit', compact('parcour'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParcourScolaire $parcour)
    {
        $request->validate([
            'id_par' => 'required',
            'annee_sco' => 'required',
            'moy_s1' => 'required',
            'moy_s2' => 'required',
            'moy_ann' => 'required',
            'etablissement_sco' => 'required',
            'classe' => 'required',
        ]);
        $input = $request->all();
        $parcour->update($input);
        return redirect()->route('parcours.index')->with('success', 'parcours mis a jour avec succes ');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParcourScolaire $parcour)
    {
        $parcour->delete();
        return redirect()->route('parcours.index')->with('success', 'utilisateur supprimer avec succes');
   
    }
}
