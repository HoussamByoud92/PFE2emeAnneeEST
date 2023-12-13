<?php

namespace App\Http\Controllers;

use App\Models\Infraction;
use Illuminate\Http\Request;
use App\Models\Beneficiaire;

class InfractionController extends Controller
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




    public function index($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        $infraction = Infraction::where('id_benef', $id_benef)->paginate(5);
        return view('Infraction.All', compact('infraction', 'beneficiaire'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        return view('Infraction.Add', compact('beneficiaire'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Infraction::create($input);
        return redirect()->route('infraction.show', $input['id_benef'])->with('success', 'Demande ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_benef)
    {
        $beneficiaire = Beneficiaire::findorfail($id_benef);
        $infraction = Infraction::where('id_benef', $id_benef)->paginate(5);
        return view('Infraction.All', compact('infraction', 'beneficiaire'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infraction $infraction)
    {
        $beneficiaire = Beneficiaire::findorfail($infraction->beneficiaire->id);
        return view('Infraction.edit', compact('infraction', 'beneficiaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Infraction $infraction)
    {
        $input = $request->all();
        $infraction->update($input);
        return redirect()->route('infraction.show', $infraction->id_benef)->with('success', 'infraction mis a jour avec succes ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infraction $infraction)
    {
        $infraction->delete();
        return redirect()->route('infraction.show', $infraction->id_benef)->with('success', 'dossier Medical supprimer avec succes');
    }
}
