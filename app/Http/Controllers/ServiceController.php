<?php

namespace App\Http\Controllers;

use App\Models\bande;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;

class ServiceController extends Controller
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
     * @param  \App\Http\Requests\StoreserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $por = Validator::make($request->all(), [
            'cover' => 'required|sometimes|image',
        ]);
        if ($por->passes()) {
            $file = $request->file('cover');

            $filenameImg = 'services/' . time() . '.' . $file->getClientOriginalName();
            $file == '' ? '' : $file->move('storage/services', $filenameImg);

            if ($request->cover) {
                service::create([
                    'bande_id' => $request->bande_id,
                    'serviceTitre' => $request->serviceTitre,
                    'description' => $request->description,
                    'cover' => $filenameImg,
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
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = service::find($id);
        $branches = bande::get();
        //dd($service);
        return view("admin.pages.addBande", compact("service", "branches"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserviceRequest  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->id != "") {
            $line = service::findOrFail($request->id);
            if ($line) {
                $file = $request->file('cover');
                $file == '' ? '' : ($filenameImg = 'services/' . time() . '.' . $file->getClientOriginalName());
                $file == '' ? '' : $file->move('storage/services', $filenameImg);

                $request->bande_id == "" ? $line->bande_id = $line->bande_id : $line->bande_id = $request->id;
                $request->serviceTitre == "" ? $line->serviceTitre = $line->serviceTitre : $line->serviceTitre = $request->serviceTitre;
                $request->description == "" ? $line->description = $line->description : $line->description = $request->description;
                $request->cover == "" ? $line->cover = $line->cover : $line->cover = $filenameImg;
                $line->save();
                return back()->with(['message' => 'Modification réussit', "type" => "success"]);
            } else {
                return back()->with(['message' => 'Merci de vérifier le formulaire!', "type" => "danger"]);
            }
        }
        if ($request->cover) {
            service::create([
                'bande_id' => $request->bande_id,
                'serviceTitre' => $request->serviceTitre,
                'description' => $request->description,
                'cover' => $filenameImg,
            ]);
            return back()->with(['message' => 'Enregistrement réussit', "type" => "success"]);
        } else {
            return back()->with(['message' => 'Merci de vérifier le formulaire!', "type" => "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = service::find($id);
        $cover = public_path() . '/storage/' . $part->cover;
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
