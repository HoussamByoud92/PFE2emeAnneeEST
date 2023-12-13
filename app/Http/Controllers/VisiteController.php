<?php

namespace App\Http\Controllers;

use App\Models\Visite;
use App\Models\Beneficiaire;
use App\Models\Tuteur;
use Illuminate\Http\Request;

class VisiteController extends Controller
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

        abort(403, 'vous n etes pas autoriser');
    });
}


    public function index($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        $tuteur = Tuteur::where('id_benf', $id_benef)->first();
        $visite = Visite::where('id_benef', $id_benef)->paginate(5);
        return view('Visite.All', compact('visite', 'beneficiaire','tuteur'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crea($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        return view('Visite.Add', compact('beneficiaire'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id_benef = $request->input('id_benef');
        $tuteur = Tuteur::where('id_benf', $id_benef)->first();
        $request->merge(['id_tuteur' => $tuteur->id]);
        $input = $request->all();
        Visite::create($input);
        return redirect()->route('visite.show', $input['id_benef'])->with('success', 'Demande ajoutée avec succès');
    } 

    /**
     * Display the specified resource.
     */
    public function show($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        $tuteur = Tuteur::where('id_benf', $id_benef)->first();
        $visite = visite::where('id_benef', $id_benef)->paginate(5);
        return view('Visite.All', compact('visite', 'beneficiaire','tuteur'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visite $visite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visite $visite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visite $visite)
    {
        $visite->delete();
        return redirect()->route('visite.show', $visite->id_benef)->with('success', 'dossier Medical supprimer avec succes');
    }
}
