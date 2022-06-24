<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\contact;
use App\Models\newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorecontactRequest;
use App\Http\Requests\UpdatecontactRequest;
use App\Models\bande;
use App\Models\service;

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
    public function allbranches()
    {
        $allbranches = bande::get();
        return view('site.pages.allBranches', compact("allbranches"));
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
    public function detailBranche($id)
    {
        $oneBranche = bande::find($id);
        return view("site.pages.detailservice", compact("oneBranche"));
    }
    public function oneservice($id)
    {
        $oneservice = service::with("branche")->where("id", $id)->first();
        //dd($oneservice);
        return view("site.pages.oneService", compact("oneservice"));
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
                'email' => ['required', 'string', 'email', 'max:255'],
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
    public function adduser(Request $request)
    {
        $re =   Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
        if ($re->passes()) {
            $rep = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'notifiable' => $request->notifiable,
                'password' => Hash::make($request->password),
            ]);
            if ($rep) {
                return response()->json(
                    [
                        'reponse' => true,
                        'msg' => 'Utilisateur enregistrer avec succès',
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
    public function edit($id)
    {
        $users = User::get();
        $userEdit = User::find($id);
        return view("admin.pages.users", compact("userEdit", "users"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecontactRequest $request
     * @param  \App\Models\contact                     $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if ($request->id != "") {
            $line = User::findOrFail($request->id);
            if ($line) {
                $request->name == "" ? $line->name = $line->name : $line->name = $request->name;
                $request->email == "" ? $line->email = $line->email : $line->email = $request->email;
                $request->notifiable == "" ? $line->notifiable = $line->notifiable : $line->notifiable = $request->notifiable;
                $request->password == "" ? $line->password = $line->password : $line->password = Hash::make($request->password);
                $line->save();
                return response()->json([
                    'reponse' => true,
                    'msg' => 'Utilisateur mis à jour',
                ]);
            } else {
                return response()->json([
                    'reponse' => false,
                    'msg' => 'Merci de vérifier le formulaire!',
                ]);
            }
        } else {
            return response()->json([
                'reponse' => false,
                'msg' => 'Erreur de mise à jour!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->email == Auth::user()->email) {
                return response()->json([
                    'reponse' => false,
                    'msg' => 'Impossible de supprimer cet utilisateur car il est actuellement connecté',
                ]);
            } else {
                $rep = $user->delete();
                if ($user) {
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
    }
}
