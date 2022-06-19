<?php

namespace App\Http\Controllers;

use App\Models\temoignage;
use App\Http\Requests\UpdatetemoignageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temoignage = temoignage::get();
        return view("admin.pages.temoignage", compact('temoignage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.addTemoignage");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretemoignageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $por = Validator::make($request->all(), [
            'photo' => 'required|sometimes|image',
        ]);
        if ($por->passes()) {
            $file = $request->file('photo');
            // dd($file->getClientOriginalName());
            $filenameImg = 'temoignage/' . time() . '.' . $file->getClientOriginalName();
            $file == '' ? '' : $file->move('storage/temoignage', $filenameImg);

            if ($request->photo) {
                temoignage::create([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'metier' => $request->metier,
                    'description' => $request->description,
                    'photo' => $filenameImg,
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
     * @param  \App\Models\temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show(temoignage $temoignage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function edit(temoignage $temoignage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetemoignageRequest  $request
     * @param  \App\Models\temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetemoignageRequest $request, temoignage $temoignage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy(temoignage $temoignage)
    {
        //
    }
}
