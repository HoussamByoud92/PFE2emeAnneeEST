<?php

namespace App\Http\Controllers;

use App\Models\Tuteur;
use Illuminate\Http\Request;

class TuteurController extends Controller
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
    public function show(Tuteur $tuteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tuteur $tuteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tuteur $tuteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tuteur $tuteur)
    {
        //
    }
}
