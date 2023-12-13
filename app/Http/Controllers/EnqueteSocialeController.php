<?php

namespace App\Http\Controllers;

use App\Models\EnqueteSociale;
use App\Models\Demande;
use Illuminate\Http\Request;

class EnqueteSocialeController extends Controller
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
            }elseif ($userRole === 'guide social') {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized.');
    });
}




    public function index()
    {
        $enqueteSociale = EnqueteSociale::latest()->paginate(5);
        return view('EnqueteSociale.All', compact('enqueteSociale'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function index_un($id_demande)
    {
        $enqueteSociale = EnqueteSociale::where('id_demande', $id_demande)->first();
        return view('EnqueteSociale.edit', compact('enqueteSociale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $demande = Demande::all();
        return view('EnqueteSociale.Add', ['demande' => $demande]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_enquete' => 'required'
        ]);
        $input = $request->all();
        EnqueteSociale::create($input);
        return redirect()->route('enqueteSociale.index')->with('success', 'Enquete Sociale ajouter avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(EnqueteSociale $enqueteSociale)
    {
        $demande = Demande::find($enqueteSociale->id_demande);
        return view('EnqueteSociale.show', compact('enqueteSociale', 'demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EnqueteSociale $enqueteSociale)
    {
        return view('EnqueteSociale.edit', compact('enqueteSociale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EnqueteSociale $enqueteSociale)
    {
        $input = $request->all();
        $enqueteSociale->update($input);
        return redirect()->route('enqueteSociale.index')->with('success', 'Enquete Sociale mis a jour avec succes ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnqueteSociale $enqueteSociale)
    {
        $enqueteSociale->delete();
        return redirect()->route('enqueteSociale.index')->with('success', 'Enquete Sociale supprimer avec succes');
    }
}
