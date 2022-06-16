<?php

namespace App\Http\Controllers;

use App\Models\partenaire;
use App\Http\Requests\StorepartenaireRequest;
use App\Http\Requests\UpdatepartenaireRequest;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepartenaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepartenaireRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show(partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function edit(partenaire $partenaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepartenaireRequest  $request
     * @param  \App\Models\partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepartenaireRequest $request, partenaire $partenaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(partenaire $partenaire)
    {
        //
    }
}
