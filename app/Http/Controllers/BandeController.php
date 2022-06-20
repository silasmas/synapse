<?php

namespace App\Http\Controllers;

use App\Models\bande;
use Illuminate\Http\Request;
use App\Http\Requests\StorebandeRequest;
use App\Http\Requests\UpdatebandeRequest;
use App\Models\service;
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
    public function show($id)
    {
        $detail = bande::where("id", $id)->first();
        $branches = bande::get();
        return view('admin.pages.service', compact("detail", "branches"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bande  $bande
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branche = bande::find($id);
        $branches = bande::get();
        //dd($service);
        return view("admin.pages.addBande", compact("branche", "branches"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebandeRequest  $request
     * @param  \App\Models\bande  $bande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->id != "") {
            $line = bande::findOrFail($request->id);
            if ($line) {
                $file = $request->file('image');
                $file == '' ? '' : ($filenameImg = 'branches/' . time() . '.' . $file->getClientOriginalName());
                $file == '' ? '' : $file->move('storage/branches', $filenameImg);

                $request->titre == "" ? $line->titre = $line->titre : $line->titre = $request->titre;
                $request->description == "" ? $line->description = $line->description : $line->description = $request->description;
                $request->image == "" ? $line->image = $line->image : $line->image = $filenameImg;
                $line->save();
                return back()->with(['message' => 'Modification réussit', "type" => "success"]);
            } else {
                return back()->with(['message' => 'Merci de vérifier le formulaire!', "type" => "danger"]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bande  $bande
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = bande::find($id);
        $ser = service::where("bande_id", $id)->get();
        if ($ser) {
            foreach ($ser as $s) {
                $cover = public_path() . '/storage/' . $s->cover;
                file_exists($cover) ? unlink($cover) : '';
            }
        }
        $cover = public_path() . '/storage/' . $part->image;
        file_exists($cover) ? unlink($cover) : '';
        $rep = $part->delete();
        if ($rep) {
            return response()->json([
                'reponse' => true,
                'msg' => 'Suppression Réussie',
            ]);
        } else {
            return response()->json([
                'reponse' => false,
                'msg' => 'Errur',
            ]);
        }
    }
}
