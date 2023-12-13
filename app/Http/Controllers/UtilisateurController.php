<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{


    /*public function __construct()
    {
        $this->middleware('auth')->except('index');
    }*/
    


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateur = User::latest()->paginate(5);
        return view('Utilisateur.All', compact('utilisateur'))->with('i', (request()->input('page', 1) - 1) * 5);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Utilisateur.Add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        User::create($input);
        return redirect()->route('utilisateur.index')->with('success', 'Utilisateur ajouté avec succes');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(User $utilisateur)
    {
        return view('Utilisateur.show', compact('utilisateur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $utilisateur)
    {
        return view('Utilisateur.edit', compact('utilisateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $utilisateur)
    {
        $input = $request->all();
        $utilisateur->update($input);
        return redirect()->route('utilisateur.index')->with('success', 'utilisateur mis a jour avec succes ');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $utilisateur)
    {
        $utilisateur->delete();
        return redirect()->route('utilisateur.index')->with('success', 'utilisateur supprimer avec succes');
   
    }
}
