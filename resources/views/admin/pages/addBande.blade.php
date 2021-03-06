@extends('admin.parties.templateAdmin', ['titre' => 'Ajout branche & service'])

    @section('autres_style')
        <link href="{{ asset('admin/css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/parsley/parsley.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap-markdown/bootstrap-markdown.min.css') }}">
    
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
                        <li class="{{isset($service)?"":"active" }}"><a data-toggle="tab" href="#tab-branch">
                                Ajouter branche
                                <span class="label label-warning">Formulaire</span>
                            </a>
                        </li>
                        <li class="{{isset($service)?"active":"" }}"><a data-toggle="tab" href="#tab-service">
                                Ajouter Service
                                <span class="label label-warning">Formulaire</span>
                            </a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#tab-galerie">
                            Galerie du service
                                <span class="label label-warning">Formulaire</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane {{isset($service)?"":"active" }}" id="tab-branch">
                            <div class="panel-body">
                                <div class="ibox-title">
                                    @if (isset($branche))
                                    <h5>Ce formulaire vous permet de modifier une branche</h5>
                                    @else
                                    <h5>Ce formulaire vous permet d'enregistrer une branche</h5>
                                    @endif
                                   
                                </div>
                                <div class="ibox-content">
                                    <div class="sk-spinner sk-spinner-wandering-cubes">
                                        <div class="sk-cube1"></div>
                                        <div class="sk-cube2"></div>
                                    </div>
                                    <div class='row'>
                                        <div class=" col-lg-12 col-sm-12">
                                            <form method="POST" class="" action="{{ isset($branche)?route('updateBranche'):route('storeBranche')  }}"
                                                class='form-group' data-parsley-validate enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div>
                                                        <input name="id" hidden value="{{ isset($branche)?$branche->id:"" }}" />
                                                    </div>
                                                    <div class="col-sm-12 form-group ">
                                                        <label>Titre de la brache</label>
                                                        <input type="text" placeholder="Titre de la brache"
                                                            class="form-control" name='titre' required
                                                            aria-required="true" value="{{ isset($branche)?$branche->titre:"" }}" data-parsley-minlength="2"
                                                            data-parsley-trigger="change">                                                        
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label>Image</label>
                                                        <div class=" fileinput fileinput-new input-group"
                                                            data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file"><span
                                                                    class="fileinput-new">Image</span>
                                                                <span class="fileinput-exists">Changer</span><input
                                                                    type="file" name="image" {{ isset($branche)?"":"required" }}></span>
                                                            <a href="#"
                                                                class="input-group-addon btn btn-default fileinput-exists"
                                                                data-dismiss="fileinput">Supprimer</a>
                                                        </div>
                                                    </div>
                                                    <div class=" col-sm-12 form-group">
                                                        <label>Description </label>
                                                        <textarea name="description" class="summernote" rows="12" data-parsley-trigger="change" required
                                                            aria-required="true">
                                                            {{ isset($branche)?$branche->description:"" }}
                                                </textarea>
                                                    </div>
                                                    <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">

                                                        <div class="col-sm-offset-4 col-sm-5">
                                                            <button class="ladda-button btn btn-sm btn-primary" 
                                                                type="submit">{{ isset($branche)?"Modifier":"Enregistrer" }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane {{isset($service)?"active":"" }}" id="tab-service">
                            <div class="panel-body">
                                <div class="ibox-title">
                                    <h5>Ce formulaire vous permet d'enregistrer le service d'une branche</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="sk-spinner sk-spinner-wandering-cubes">
                                        <div class="sk-cube1"></div>
                                        <div class="sk-cube2"></div>
                                    </div>
                                    <div class='row'>
                                        <div class=" col-lg-12 col-sm-12">
                                            <form id="formFidel" method="POST" class="" action="{{isset($service)?route('updateService'):route('storeService') }}"
                                                class='form-group' data-parsley-validate enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div>
                                                        <input name="id" hidden value="{{ isset($service)?$service->id:"" }}" />
                                                    </div>                                                  
                                                    <div class="col-sm-6 form-group ">
                                                        <label>Branches</label>
                                                        <select class=" form-control" id="" required aria-required="true"
                                                            class="validate" data-parsley-trigger="change"
                                                            name="bande_id">
                                                            <option value=""  {{ isset($service)?" ":"disabled selected" }}>Selectionnez une branches
                                                            </option>
                                                           @forelse ($branches as $b)
                                                           <option value="{{ $b->id }}" {{isset($service) && $service->bande_id==$b->id?"selected":"" }}>{{ $b->titre }}</option>
                                                           @empty
                                                               
                                                           @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 form-group ">
                                                        <label>Titre du service</label>
                                                        <input type="text" placeholder="Titre du service"
                                                            class="form-control" name='serviceTitre' required
                                                            aria-required="true" value="{{ isset($service)?$service->serviceTitre:"" }}" data-parsley-minlength="2"
                                                            data-parsley-trigger="change">
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <label>Image</label>
                                                        <div class=" fileinput fileinput-new input-group"
                                                            data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file"><span
                                                                    class="fileinput-new">Image</span>
                                                                <span class="fileinput-exists">Changer</span><input
                                                                    type="file" name="cover" ></span>
                                                            <a href="#"
                                                                class="input-group-addon btn btn-default fileinput-exists"
                                                                data-dismiss="fileinput">Supprimer</a>
                                                        </div>
                                                    </div>
                                                    <div class=" col-sm-12 form-group">
                                                        <label>Description </label>
                                                        <textarea name="description" class="summernote" rows="12" data-parsley-trigger="change" required
                                                            aria-required="true">
                                                            {{ isset($service)?$service->description:""}}
                                                </textarea>
                                                    </div>
                                                    <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">

                                                        <div class="col-sm-offset-4 col-sm-5">

                                                            <button class="ladda-button btn btn-sm btn-primary"
                                                                id='ladda-session' data-style="expand-right"
                                                                type="submit">{{ isset($service)?"Modifier":"Enregistrer"}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-galerie">
                            <div class="panel-body">
                                <div class="ibox-title">
                                    <h5>Ce formulaire vous permet d'enregistrer la galerie d'un service</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="sk-spinner sk-spinner-wandering-cubes">
                                        <div class="sk-cube1"></div>
                                        <div class="sk-cube2"></div>
                                    </div>
                                    <div class='row'>
                                        <div class=" col-lg-12 col-sm-12">
                                            <form id="formFidel" method="POST" class="" action="{{route('storegalerie') }}"
                                                class='form-group' data-parsley-validate enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div>
                                                        <input name="id" hidden value="" />
                                                    </div>                                                  
                                                    <div class="col-sm-6 form-group ">
                                                        <label>Branches</label>
                                                        <select class=" form-control" id="" required aria-required="true"
                                                            class="validate" data-parsley-trigger="change"
                                                            name="service_id">
                                                            <option value="">Selectionnez un service
                                                            </option>
                                                           @forelse ($services as $b)
                                                           <option value="{{ $b->id }}">{{ $b->serviceTitre }}</option>
                                                           @empty
                                                               
                                                           @endforelse
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label>Image 1</label>
                                                        <div class=" fileinput fileinput-new input-group"
                                                            data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file"><span
                                                                    class="fileinput-new">Image</span>
                                                                <span class="fileinput-exists">Changer</span><input
                                                                    type="file" name="img1"  required></span>
                                                            <a href="#"
                                                                class="input-group-addon btn btn-default fileinput-exists"
                                                                data-dismiss="fileinput">Supprimer</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label>Image 2</label>
                                                        <div class=" fileinput fileinput-new input-group"
                                                            data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file"><span
                                                                    class="fileinput-new">Image</span>
                                                                <span class="fileinput-exists">Changer</span><input
                                                                    type="file" name="img2" ></span>
                                                            <a href="#"
                                                                class="input-group-addon btn btn-default fileinput-exists"
                                                                data-dismiss="fileinput">Supprimer</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label>Image 3</label>
                                                        <div class=" fileinput fileinput-new input-group"
                                                            data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file"><span
                                                                    class="fileinput-new">Image</span>
                                                                <span class="fileinput-exists">Changer</span><input
                                                                    type="file" name="img3" ></span>
                                                            <a href="#"
                                                                class="input-group-addon btn btn-default fileinput-exists"
                                                                data-dismiss="fileinput">Supprimer</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label>Image 4</label>
                                                        <div class=" fileinput fileinput-new input-group"
                                                            data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file"><span
                                                                    class="fileinput-new">Image</span>
                                                                <span class="fileinput-exists">Changer</span><input
                                                                    type="file" name="img4" ></span>
                                                            <a href="#"
                                                                class="input-group-addon btn btn-default fileinput-exists"
                                                                data-dismiss="fileinput">Supprimer</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <label>Image 5</label>
                                                        <div class=" fileinput fileinput-new input-group"
                                                            data-provides="fileinput">
                                                            <div class="form-control" data-trigger="fileinput">
                                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                                <span class="fileinput-filename"></span>
                                                            </div>
                                                            <span class="input-group-addon btn btn-default btn-file"><span
                                                                    class="fileinput-new">Image</span>
                                                                <span class="fileinput-exists">Changer</span><input
                                                                    type="file" name="img5" ></span>
                                                            <a href="#"
                                                                class="input-group-addon btn btn-default fileinput-exists"
                                                                data-dismiss="fileinput">Supprimer</a>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">

                                                        <div class="col-sm-offset-4 col-sm-5">

                                                            <button class="ladda-button btn btn-sm btn-primary"
                                                                id='ladda-session' data-style="expand-right"
                                                                type="submit">Enregistrer</button>
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
                    // e.preventDefault();  
                    // alert('ok')     
                    // $('#tab-service').children('.ibox-content').toggleClass('sk-loading');       
                    // load('#tab-service');
                });
            });

            function load(id) {
                $(id).children('.ibox-content').toggleClass('sk-loading');
            }

        </script>
    @endsection
