@extends('admin.parties.templateAdmin', ['titre' => 'Utilisateurs'])

@section('autres_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/parsley/parsley.css') }}">
@endsection
@section('content')
    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
            <div class="col-sm-{{ !isset($userEdit)?'8':'12' }}">
                <div class="ibox">
                    <div class="ibox-content">
                        
                        <h2>Utilisateurs</h2>

                        <div class="clients-list">
                            <ul class="nav nav-tabs">
                                @if (!isset($userEdit) )
                                <span class="pull-right small text-muted">{{ $users->count() }} Elements</span>
                                    
                                @endif
                                <li class="active"><a data-toggle="tab" href="#tab-1">
                                    <i class="fa fa-user"></i> {{ isset($userEdit)?"Modifier un
                                    utilisateur":"Ajouter un
                                    utilisateur" }}</a></li>
                                        @if (!isset($userEdit))
                                            
                                        <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-user"></i>Liste des
                                                utilisateurs</a></li>
                                        @endif
                            </ul>
                            <div class="tab-content" id="tab-adduser">
                                <div id="tab-1" class="tab-pane active ">
                                    <div class="full-height-scroll">
                                        <div class="ibox-content">
                                            <div class="sk-spinner sk-spinner-wave">
                                                <div class="sk-rect1"></div>
                                                <div class="sk-rect2"></div>
                                                <div class="sk-rect3"></div>
                                                <div class="sk-rect4"></div>
                                                <div class="sk-rect5"></div>
                                            </div>
                                            <div class='row'>
                                                <div class=" col-lg-12 col-sm-12">
                                                    <form method="POST" class="" {{ !isset($userEdit)?'onsubmit="addUser(this)"':'' }}
                                                        action="{{ isset($userEdit) ? route('updateUser') : route('adduser') }}"
                                                        class='form-group' data-parsley-validate id="{{isset($userEdit)?'updatUser':'' }}">
                                                        @csrf
                                                        <div class="row">
                                                            <div>
                                                                <input name="id" hidden
                                                                    value="{{ isset($userEdit) ? $userEdit->id : '' }}" />
                                                            </div>
                                                            <div class="col-sm-6 form-group ">
                                                                <label>Nom</label>
                                                                <input type="text" placeholder="Nom" id="name"
                                                                    class="form-control" name='name' required
                                                                    aria-required="true"
                                                                    value="{{ isset($userEdit) ? $userEdit->name : '' }}"
                                                                    data-parsley-minlength="2"
                                                                    data-parsley-trigger="change">
                                                            </div>
                                                            <div class="col-sm-6 form-group ">
                                                                <label>Email</label>
                                                                <input type="text" placeholder="Adresse mail"
                                                                    class="form-control" name='email' required
                                                                    id="email" aria-required="true"
                                                                    value="{{ isset($userEdit) ? $userEdit->email : '' }}"
                                                                    data-parsley-minlength="2"
                                                                    data-parsley-trigger="change">
                                                            </div>
                                                            <div class="col-sm-6 form-group ">
                                                                <label>Mot de passe</label>
                                                                <input type="password" placeholder="Mot de passe"
                                                                    id="password" class="form-control" name='password'
                                                                    {{ !isset($userEdit) ??"required" }} data-parsley-minlength="2"
                                                                    data-parsley-trigger="change">
                                                            </div>
                                                            <div class="col-sm-6 form-group ">
                                                                <label>Repeter le mot de passe</label>
                                                                <input type="password" placeholder="Repeter le mot de passe"
                                                                    id="password_confirmation" class="form-control"
                                                                    name='password_confirmation' {{ !isset($userEdit) ??"required" }} data-parsley-minlength="2"
                                                                    data-parsley-trigger="change">
                                                            </div>
                                                            <div class="col-sm-12 form-group ">
                                                                <label>Notifiable</label>
                                                                <select class=" form-control" id="" required
                                                                    aria-required="true" class="validate"
                                                                    data-parsley-trigger="change" name="notifiable">
                                                                    <option value="non"{{  isset($userEdit) && $userEdit->notifiable == 'non' ? 'selected' : 'selected' }} selected>NON</option>
                                                                    <option value="oui" {{isset($userEdit) && $userEdit->notifiable == 'oui' ? 'selected' : '' }}>OUI</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">

                                                                <div class="col-sm-offset-4 col-sm-5">
                                                                    <button class="ladda-button btn btn-sm btn-primary"
                                                                        id="{{isset($userEdit) ?'btnUpdateUser':'btnAddUser'  }}"
                                                                        type="submit">{{ isset($userEdit) ? 'Modifier' : 'Enregistrer' }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="full-height-scroll">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <tbody>
                                                    @forelse ($users as $t)
                                                        <tr>
                                                            <td class="client-avatar"><img alt="image"
                                                                    src="{{ asset('admin/img/default.png') }}"> </td>
                                                            <td><a data-toggle="tab" href="#{{ $t->id }}"
                                                                    class="client-link">{{ $t->name }}</a></td>
                                                            <td> {{ $t->prenom }}</td>
                                                            <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                                            <td> {{ $t->email }}</td>
                                                            <td class="client-status text-center"><span
                                                                    class="label label-{{ $t->notifiable == 'oui' ? 'primary' : 'danger' }}">
                                                                    {{ $t->notifiable == 'oui' ? 'Notifiable' : 'Pas notifiable' }}</span>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                    @endforelse


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @if (!isset($userEdit) )
                
            <div class="col-sm-4">
                <div class="ibox " id="tab-user">

                    <div class="ibox-content">
                        <div class="sk-spinner sk-spinner-wandering-cubes">
                            <div class="sk-cube1"></div>
                            <div class="sk-cube2"></div>
                        </div>
                        <div class="tab-content">
                            @forelse ($users as $t)
                                <div id="{{ $t->id }}" class="tab-pane {{ $loop->first ? 'active' : '' }}">
                                    <div class="row m-b-lg">
                                        <div class="col-lg-12 text-center">
                                            <h2>{{ $t->prenom . ' ' . $t->name }}</h2>

                                            <div class="m-b-sm">
                                                <img alt="image" class="img-circle"
                                                    src="{{ asset('admin/img/default.png') }}"
                                                    style="width: 100px; height:100px">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">                                           
                                            <a href='{{ route('editUser', ['id'=>$t->id]) }}' class="btn btn-warning btn-sm btn-block"><i
                                                    class="fa fa-trash"></i> Modifier
                                            </a>
                                            <button onclick="supprimer('deleteUser',this.title)"
                                                title="{{ $t->id }}" class="btn btn-danger btn-sm btn-block"><i
                                                    class="fa fa-trash"></i> Supprimer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
@section('autres-script')
    <script src="{{ asset('admin/js/parsley/js/parsley.js') }}"></script>
    <script src="{{ asset('admin/js/parsley/i18n/fr.js') }}"></script>
    <script src="{{ asset('assets/js/contact.form.js') }}"></script>

    <script>
        function addUser(val) {
            // Stop the browser from submitting the form.
            event.preventDefault();
            var btn = document.querySelector('#btnUpdateUser');
            // 'use strict';
            // Get the form.
            var form = $('#addUser');
            // Serialize the form data.
            var formData = $(val).serialize();


            btn.setAttribute('disabled', 'true');
            btn.innerHTML = "En cour d'envoi";
            // Submit the form using AJAX.
            $.ajax({
                    type: 'POST',
                    url: $(form).attr('action'),
                    data: formData
                })
                .done(function(response) {
                    btn.removeAttribute('disabled');
                    btn.innerHTML = "Enregistrer";
                    if (response.reponse) {
                        swal({
                            title: response.msg,
                            icon: 'success'
                        });
                        // Clear the form.
                        $(form)[0].reset();
                        location.reload();
                    } else {
                        swal({
                            title: response.msg,
                            icon: 'error'
                        });
                    }
                })
                .fail(function(data) {
                    btn.removeAttribute('disabled');
                    btn.innerHTML = "Enregistrer";
                    // Set the message text.
                    if (data.responseText !== '') {
                        swal({
                            title: response.msg,
                            icon: 'error'
                        });
                    } else {
                        swal({
                            title: response.msg,
                            icon: "Oops! Une erreur s'est produite et votre message n'a pas pu être envoyé."
                        });
                    }
                });

        }

        function load(id) {
            $(id).children('.ibox-content').toggleClass('sk-loading');
        }
    </script>
@endsection
