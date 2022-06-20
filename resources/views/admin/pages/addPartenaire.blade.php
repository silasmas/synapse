@extends('admin.parties.templateAdmin', ['titre' => 'Ajout partenaire'])


@section('autres_style')
    <link href="{{ asset('admin/css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/chosen/bootstrap-chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/parsley/parsley.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/chosen/bootstrap-chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap-markdown/bootstrap-markdown.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/dualListbox/bootstrap-duallistbox.min.css') }}">
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <div class="panel-body" id="tab-Team">
                        <div class="ibox-content">

                            @if (session()->has('message'))
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="alert alert-success alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close"
                                            type="button">×</button>
                                        {{ session()->get('message') }}
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <div class="tabs-container">
                                    <div class="ibox-title">
                                        @if (isset($partenaire))                                            
                                        <h5>Ce formulaire vous permet de modifier un partenaire</h5>
                                        @else
                                        <h5>Ce formulaire vous permet d'enregistrer un partenaire</h5>                                            
                                        @endif
                                    </div>
                                    <div class="col-lg-offset-1 col-lg-10 col-sm-12">
                                        <div class="ibox" id="tabCat">
                                            <div class="ibox-content">
                                                <div class="sk-spinner sk-spinner-wandering-cubes">
                                                    <div class="sk-cube1"></div>
                                                    <div class="sk-cube2"></div>
                                                </div>
                                                <div class='row'>
                                                    <div class=" col-lg-12 col-sm-12">
                                                        <form id="" method="POST" action="{{isset($partenaire)?route('updatePartenaire'):route('storepartenaire') }}"
                                                            class="" data-parsley-validate enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div>
                                                                    <input name="id" hidden value="{{ isset($partenaire)?$partenaire->id:"" }}" />
                                                                </div>  
                                                                <div class="col-lg-12 form-group ">
                                                                    <label>Nom du partenaire</label>
                                                                    <input type="text" class="form-control"
                                                                        name='titre' required
                                                                        value="{{ isset($partenaire) ? $partenaire->titre : '' }}"
                                                                        aria-required="true" data-parsley-minlength="2"
                                                                        data-parsley-trigger="change">
                                                                </div>
                                                               
                                                                <div class="col-sm-12 form-group">
                                                                    <label>Logo</label>
                                                                    <div class=" fileinput fileinput-new input-group"
                                                                        data-provides="fileinput">
                                                                        <div class="form-control" data-trigger="fileinput">
                                                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                            <span class="fileinput-filename"></span>
                                                                        </div>
                                                                        <span class="input-group-addon btn btn-default btn-file"><span
                                                                                class="fileinput-new">Logo</span>
                                                                            <span class="fileinput-exists">Changer</span><input
                                                                                type="file" name="logo"  {{ isset($partenaire)?"":"required" }}></span>
                                                                        <a href="#"
                                                                            class="input-group-addon btn btn-default fileinput-exists"
                                                                            data-dismiss="fileinput">Supprimer</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                                                                    <div class="col-sm-offset-4 col-sm-5">
                                                                        <button class="ladda-button btn btn-sm btn-primary"
                                                                            id='ladda-session' data-style="expand-right"
                                                                            type="submit">{{ isset($partenaire) ? 'Modifier' : 'Enregistrer' }}</button>
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('autres-script')
    <script src="{{ asset('admin/js/bootstrap-markdown/bootstrap-markdown.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-markdown/markdown.js') }}"></script>
    <script src="{{ asset('admin/js/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin/js/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/js/jasny/jasny-bootstrap.min.js') }}"></script>


    <script src="{{ asset('admin/js/parsley/js/parsley.js') }}"></script>
    <script src="{{ asset('admin/js/parsley/i18n/fr.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();            

        });

        function load(id) {
            $(id).children('.ibox-content').toggleClass('sk-loading');
        }
    </script>
@endsection
