
@extends('admin.parties.templateAdmin', ['titre' => 'Ajout temoignage'])

@section('autres_style')
    <link href="{{ asset('admin/css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/parsley/parsley.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/iCheck/custom.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap-markdown/bootstrap-markdown.min.css') }}">
    <link href="{{ asset('admin/css/dropzone/basic.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/dropzone/dropzone.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row m-t-lg">
            @if (session()->has('message'))
                <div class="col-md-6 col-md-offset-3">
                    <div class="alert alert-{{session()->get('type')}} alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        {{ session()->get('message') }}
                    </div>
                </div>
            @endif
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-fidel">
                                Ajouter témoignage
                                <span class="label label-warning">Formulaire</span>
                            </a>
                        </li>                       
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-fidel">
                            <div class="panel-body">
                                <div class="ibox-title">
                                    <h5>Ce formulaire vous permet d'enregistrer un témoignage</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="sk-spinner sk-spinner-wandering-cubes">
                                        <div class="sk-cube1"></div>
                                        <div class="sk-cube2"></div>
                                    </div>
                                    <div class='row'>
                                        <div class=" col-lg-12 col-sm-12">
                                            <form method="POST" class="" action="{{ isset($temoignage)?route('updateTemoignage') :route('storetemoignage') }}"
                                                class='form-group' data-parsley-validate enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div>
                                                        <input name="id" hidden value="{{ isset($temoignage)?$temoignage->id :""}}" />
                                                    </div>
                                                    <div class="col-sm-6 form-group ">
                                                        <label>Nom</label>
                                                        <input type="text" placeholder="Nom"
                                                            class="form-control" name='nom' required
                                                            aria-required="true" value="{{ isset($temoignage)?$temoignage->nom :""}}" data-parsley-minlength="2"
                                                            data-parsley-trigger="change">
                                                    </div>
                                                    <div class="col-sm-6 form-group ">
                                                        <label>Prenom</label>
                                                        <input type="text" placeholder="Prenom"
                                                            class="form-control" name='prenom' required
                                                            aria-required="true" value="{{ isset($temoignage)?$temoignage->prenom :""}}" data-parsley-minlength="2"
                                                            data-parsley-trigger="change">
                                                    </div>
                                                    <div class="col-sm-6 form-group ">
                                                        <label>Metier</label>
                                                        <input type="text" placeholder="Metier"
                                                            class="form-control" name='metier' required
                                                            aria-required="true" value="{{ isset($temoignage)?$temoignage->metier :""}}" data-parsley-minlength="2"
                                                            data-parsley-trigger="change">
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label>Photo</label>
                                                        <div class=" fileinput fileinput-new input-group"
                                                            data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file"><span
                                                                    class="fileinput-new">Photo</span>
                                                                <span class="fileinput-exists">Changer</span><input
                                                                    type="file" name="photo" {{ isset($temoignage)?"":"required"}}></span>
                                                            <a href="#"
                                                                class="input-group-addon btn btn-default fileinput-exists"
                                                                data-dismiss="fileinput">Supprimer</a>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class=" col-sm-12 form-group">
                                                        <label>Témoignage </label>
                                                        <textarea name="description" class="summernote" rows="12" data-parsley-trigger="change" required
                                                            aria-required="true">
                                                            {{ isset($temoignage)?$temoignage->description :""}}
                                                </textarea>
                                                    </div>
                                                    <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">

                                                        <div class="col-sm-offset-4 col-sm-5">
                                                            @if (isset($temoignage))
                                                            <button class="ladda-button btn btn-sm btn-primary" 
                                                                type="submit">Enregistrer</button>
                                                         @else
                                                         <button class="ladda-button btn btn-sm btn-primary" 
                                                         type="submit">Modifier</button> 
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('autres-script')
        <script src="{{ asset('admin/js/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
        <script src="{{ asset('admin/js/bootstrap-markdown/markdown.js') }}"></script>
        <script src="{{ asset('admin/js/datapicker/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('admin/js/jasny/jasny-bootstrap.min.js') }}"></script>


        <script src="{{ asset('admin/js/parsley/js/parsley.js') }}"></script>
        <script src="{{ asset('admin/js/parsley/i18n/fr.js') }}"></script>

        <script src="{{ asset('admin/js/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('admin/js/dropzone/dropzone.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.summernote').summernote();
                $("#formFidel").on("submit", function(e) {
                    e.preventDefault();
                    add("#formFidel", '#tab-fidel', 'addFidel')
                });
            });

            function load(id) {
                $(id).children('.ibox-content').toggleClass('sk-loading');
            }

            function add(form, idLoad, url) {
                var f = form;
                var loade = idLoad;
                var u = url;
                load(loade);
                $.ajax({
                    url: u,
                    method: "POST",
                    data: $(f).serialize(),
                    success: function(data) {
                        load(loade);
                        if (!data.reponse) {
                            swal({
                                title: data.msg.phone ? 'Le numéro ' + data.msg.phone : '' + '' + data.msg
                                    .email ? data.msg.email : "",
                                icon: 'error'
                            })
                        } else {
                            swal({
                                title: data.msg,
                                icon: 'success'
                            })

                            $(f)[0].reset();
                        }

                    },
                });

            }
        </script>
    @endsection
