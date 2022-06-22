<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Http\Requests\StorecontactRequest;
use App\Http\Requests\UpdatecontactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
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
     * @param  \App\Http\Requests\StorecontactRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $re =   Validator::make(
            $request->all(),
            [
                'nom' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'message' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:contacts'],
            ]
        );
        if ($re->passes()) {
            $rep = contact::create(
                [
                    "nom" => $request->nom,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "description" => $request->message,
                ]
            );
            if ($rep) {
                return response()->json(
                    [
                        'reponse' => true,
                        'msg' => 'Message envoyer avec succès',
                    ]
                );
            } else {
                return response()->json(
                    [
                        'reponse' => false,
                        'msg' => 'Erreur',
                    ]
                );
            }
        } else {
            return response()->json(
                [
                    'reponse' => false,
                    'msg' => $re->errors()->first(),
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecontactRequest $request
     * @param  \App\Models\contact                     $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecontactRequest $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact $contact)
    {
        //
    }
}