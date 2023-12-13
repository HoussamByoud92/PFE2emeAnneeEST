<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\DossierMedical;
use Illuminate\Http\Request;

class DossierMedicalController extends Controller
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




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dossierMedical = DossierMedical::latest()->paginate(5);
        return view('DossierMedical.All', compact('dossierMedical'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id_benef)
    {
        $dossierMedical = DossierMedical::with('beneficiaire')->where('id_benef', $id_benef)->paginate(5);
        return view('DossierMedical.show', compact('dossierMedical'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DossierMedical $dossierMedical)
    {
        $beneficiaire = Beneficiaire::findorfail($dossierMedical->beneficiaire->id);
        return view('DossierMedical.edit', compact('dossierMedical', 'beneficiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DossierMedical $dossierMedical)
    {
        $input = $request->all();
        $dossierMedical->update($input);
        return redirect()->route('dossierMedical.show', $dossierMedical->id_benef)->with('success', 'dossierMedical mis a jour avec succes ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DossierMedical $dossierMedical)
    {
        $dossierMedical->delete();
        return redirect()->route('dossierMedical.index')->with('success', 'dossier Medical supprimer avec succes');
    }
}
