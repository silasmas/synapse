<?php

namespace App\Http\Controllers;

use App\Models\galerie;
use Illuminate\Http\Request;
use App\Http\Requests\UpdategalerieRequest;
use App\Models\service;
use Illuminate\Support\Facades\Validator;

class GalerieController extends Controller
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
     * @param  \App\Http\Requests\StoregalerieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $por = Validator::make($request->all(), [
            'image1' => 'required|sometimes|image',
        ]);
        if ($por->passes()) {
            $file = $request->file('img1');
            $file2 = $request->file('img2');
            $file3 = $request->file('img3');
            $file4 = $request->file('img4');
            $file5 = $request->file('img5');
            // dd($file);
            $filenameImg = $file == '' ? '' : 'galerie/' . time() . '.' . $file->getClientOriginalName();
            $file == '' ? '' : $file->move('storage/galerie', $filenameImg);

            $filenameImg2 = $file2 == '' ? '' : 'galerie/' . time() . '.' . $file2->getClientOriginalName();
            $file2 == '' ? '' : $file2->move('storage/galerie', $filenameImg2);

            $filenameImg3 = $file3 == '' ? '' : 'galerie/' . time() . '.' . $file3->getClientOriginalName();
            $file3 == '' ? '' : $file3->move('storage/galerie', $filenameImg3);

            $filenameImg4 = $file4 == '' ? '' : 'galerie/' . time() . '.' . $file4->getClientOriginalName();
            $file4 == '' ? '' : $file4->move('storage/galerie', $filenameImg4);

            $filenameImg5 = $file5 == '' ? '' : 'galerie/' . time() . '.' . $file5->getClientOriginalName();
            $file5 == '' ? '' : $file5->move('storage/galerie', $filenameImg5);

            if ($request->img1) {
                galerie::create([
                    'service_id' => $request->service_id,
                    'image' => $filenameImg,
                ]);
                if ($file2 != "") {
                    galerie::create([
                        'service_id' => $request->service_id,
                        'image' => $filenameImg2,
                    ]);
                }
                if ($file3 != "") {
                    galerie::create([
                        'service_id' => $request->service_id,
                        'image' => $filenameImg3,
                    ]);
                }
                if ($file4 != "") {
                    galerie::create([
                        'service_id' => $request->service_id,
                        'image' => $filenameImg4,
                    ]);
                }
                if ($file5 != "") {
                    galerie::create([
                        'service_id' => $request->service_id,
                        'image' => $filenameImg5,
                    ]);
                }
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
     * @param  \App\Models\galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galerie = service::where('id', $id)->first();
        return view('admin.pages.viewGalerie', compact('galerie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function edit(galerie $galerie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategalerieRequest  $request
     * @param  \App\Models\galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategalerieRequest $request, galerie $galerie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\galerie  $galerie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = galerie::find($id);

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
                'msg' => 'Erreur',
            ]);
        }
    }
}
