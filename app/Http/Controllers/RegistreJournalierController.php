<?php

namespace App\Http\Controllers;

use App\Models\RegistreJournalier;
use Illuminate\Http\Request;
use App\Models\Beneficiaire;

class RegistreJournalierController extends Controller
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
     
             abort(403, 'vous n ete pas autoriser.');
         });
     }
     
     

     



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creat($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        return view('RegistreJournalier.Add', compact('beneficiaire'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        RegistreJournalier::create($input);
        return redirect()->route('registreJournalier.show', $input['id_benef'])->with('success', 'Demande ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        $registreJournalier = RegistreJournalier::where('id_benef', $id_benef)->paginate(5);
        return view('RegistreJournalier.All', compact('registreJournalier', 'beneficiaire'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistreJournalier $registreJournalier)
    {
        $beneficiaire = Beneficiaire::findorfail($registreJournalier->beneficiaire->id);
        return view('RegistreJournalier.edit', compact('registreJournalier', 'beneficiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistreJournalier $registreJournalier)
    {
        $input = $request->all();
        $registreJournalier->update($input);
        return redirect()->route('registreJournalier.show', $registreJournalier->id_benef)->with('success', 'registreJournalier mis a jour avec succes ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistreJournalier $registreJournalier)
    {
        $registreJournalier->delete();
        return redirect()->route('registreJournalier.show', $registreJournalier->id_benef)->with('success', 'dossier Medical supprimer avec succes');
    }
}
