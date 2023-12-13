<?php

namespace App\Http\Controllers;

use App\Models\Beneficiaire;
use App\Models\DossierOrange;
use Illuminate\Http\Request;

class DossierOrangeController extends Controller
{


      
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
        $dossierOrange = DossierOrange::latest()->paginate(5);
        return view('DossierOrange.All', compact('dossierOrange'))->with('i', (request()->input('page', 1) - 1) * 5);
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id_benef)
    {
        $dossierOrange = DossierOrange::with('beneficiaire')->where('id_benef', $id_benef)->paginate(5);
        return view('DossierOrange.show', compact('dossierOrange'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DossierOrange $dossierOrange)
    {
        $beneficiaire = Beneficiaire::findorfail($dossierOrange->beneficiaire->id);
        return view('DossierOrange.edit', compact('dossierOrange', 'beneficiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DossierOrange $dossierOrange)
    {
        $input = $request->all();
        if ($image = $request->file('certificat_vie_collectif')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileimage);
            $input['certificat_vie_collectif'] = $profileimage;
        } else {
            unset($input['certificat_vie_collectif']);
        }
        if ($image = $request->file('engagement_tuteur')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileimage);
            $input['engagement_tuteur'] = $profileimage;
        } else {
            unset($input['engagement_tuteur']);
        }
        if ($image = $request->file('fiche_scolaire')) {
            $destinationPath = 'image/';
            $profileimage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileimage);
            $input['fiche_scolaire'] = $profileimage;
        } else {
            unset($input['fiche_scolaire']);
        }
        $dossierOrange->update($input);
        return redirect()->route('dossierOrange.show', $dossierOrange->id_benef)->with('success', 'Le dossier orange est mis a jour avec succes ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DossierOrange $dossierOrange)
    {
        $dossierOrange->delete();
        return redirect()->route('dossierOrange.index')->with('success', 'dossierOrange supprimer avec succes');
    }
}
