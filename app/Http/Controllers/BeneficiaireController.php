<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use Illuminate\Http\Request;

class BeneficiaireController extends Controller
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
            }elseif ($userRole === 'educateur') {
                return $next($request);
            }elseif ($userRole === '7aris 3am') {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized.');
    });
}


     
     








    public function index()
    {
        $beneficiaire = Beneficiaire::latest()->paginate(5);
        return view('Beneficiaire.All', compact('beneficiaire'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beneficiaire.Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_prenom' => 'required'
        ]);
        $input = $request->all();
        Beneficiaire::create($input);
        return redirect()->route('beneficiaire.index')->with('success', 'Beneficiaire ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Beneficiaire $beneficiaire)
    {
        return view('Beneficiaire.show', compact('beneficiaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiaire $beneficiaire)
    {
        return view('Beneficiaire.edit', compact('beneficiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beneficiaire $beneficiaire)
    {
        $request->validate([
            'nom_prenom' => 'required'
        ]);
        $input = $request->all();
        $beneficiaire->update($input);
        return redirect()->route('bneficiaire.index')->with('success', 'Beneficiaire mis a jour avec succes ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beneficiaire $beneficiaire)
    {
        $beneficiaire->delete();
        return redirect()->route('beneficiaire.index')->with('success', 'Beneficiaire supprimer avec succes');
    }
}
