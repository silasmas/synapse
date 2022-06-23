<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Http\Requests\StorecontactRequest;
use App\Http\Requests\UpdatecontactRequest;
use App\Models\newsletter;
use App\Models\User;
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
        return view('site.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function message()
    {
        $messages = contact::get();
        return view("admin.pages.message", compact("messages"));
    }
    public function news()
    {
        $news = newsletter::get();
        return view("admin.pages.new", compact("news"));
    }
    public function users()
    {
        $users = User::get();
        return view("admin.pages.users", compact("users"));
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
                'phone' => ['required', 'string', 'max:255', 'unique:contacts'],
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
    public function newsletter(Request $request)
    {
        $re =   Validator::make(
            $request->all(),
            [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:newsletter'],
            ]
        );
        if ($re->passes()) {
            $rep = newsletter::create(
                [
                    "email" => $request->email,
                ]
            );
            if ($rep) {
                return response()->json(
                    [
                        'reponse' => true,
                        'msg' => 'Abonnement fait avec succès',
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
