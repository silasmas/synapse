<?php

namespace App\Http\Controllers;

use App\Models\partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $partenaire = partenaire::get();
        return view("admin.pages.partenaire", compact('partenaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.addPartenaire");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepartenaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $por = Validator::make($request->all(), [
            'logo' => 'required|sometimes|image',
        ]);
        if ($por->passes()) {
            $file = $request->file('logo');
            // dd($file);
            $filenameImg = 'partenaires/' . time() . '.' . $file->getClientOriginalName();
            $file == '' ? '' : $file->move('storage/partenaires', $filenameImg);

            if ($request->logo) {
                partenaire::create([
                    'titre' => $request->titre,
                    'logo' => $filenameImg,
                ]);
                return back()->with(['message' => 'Enregistrement réussit', "type" => "success"]);
            } else {
                return back()->with(['message' => 'Merci de vérifier le formulaire!', "type" => "danger"]);
            }
        } else {
            return back()->with(['message' => $por->errors()->first(), 'type' => "danger"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show(partenaire $partenaire)
    {
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
