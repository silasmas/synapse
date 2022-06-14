<?php

namespace App\Http\Controllers;

use App\Models\bande;
use App\Http\Requests\StorebandeRequest;
use App\Http\Requests\UpdatebandeRequest;

class BandeController extends Controller
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
     * @param  \App\Http\Requests\StorebandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebandeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bande  $bande
     * @return \Illuminate\Http\Response
     */
    public function show(bande $bande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bande  $bande
     * @return \Illuminate\Http\Response
     */
    public function edit(bande $bande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebandeRequest  $request
     * @param  \App\Models\bande  $bande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebandeRequest $request, bande $bande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bande  $bande
     * @return \Illuminate\Http\Response
     */
    public function destroy(bande $bande)
    {
        //
    }
}
