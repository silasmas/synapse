<?php

namespace App\Http\Controllers;

use App\Models\bande;
use Illuminate\Http\Request;
use App\Http\Requests\StorebandeRequest;
use App\Http\Requests\UpdatebandeRequest;
use Illuminate\Support\Facades\Validator;

class BandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = bande::get();
        return view("admin.pages.home", compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = bande::get();
        return view("admin.pages.addBande", compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $por = Validator::make($request->all(), [
            'image' => 'required|sometimes|image',
        ]);
        if ($por->passes()) {
            $file = $request->file('image');
            // dd($file);
            $filenameImg = 'branches/' . time() . '.' . $file->getClientOriginalName();
            $file == '' ? '' : $file->move('storage/branches', $filenameImg);

            if ($request->image) {
                bande::create([
                    'titre' => $request->titre,
                    'description' => $request->description,
                    'image' => $filenameImg,
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
