@extends('admin.parties.templateAdmin', ['titre' => 'Ajout partenaireadmin/'])


@section('autres_style')
    <link href="{{ asset('css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/plugins/chosen/bootstrap-chosen.css') }}">
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
                                        <h5>Ce formulaire vous permet d'enregistrer les différentes fonction que peux avoir
                                            un membre de l'équipe</h5>
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
                                                        <form id="" method="POST" action="{{ route('storepartenaire') }}"
                                                            class="" data-parsley-validate>
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 form-group ">
                                                                    <label>Nom de la fonction
                                                                        (français)</label>
                                                                    <input type="text" class="form-control"
                                                                        name='fonction' required
                                                                        value="{{ isset($fonctions) ? $fonctions->fonction : '' }}"
                                                                        aria-required="true" data-parsley-minlength="2"
                                                                        data-parsley-trigger="change">
                                                                </div>
                                                                <div class="col-lg-6 form-group ">
                                                                    <label>Nom de la fonction
                                                                        (Anglais)</label>
                                                                    <input type="text" class="form-control"
                                                                        name='fonction_en' required
                                                                        value="{{ isset($fonctions) ? $fonctions->getTranslation('fonction', 'en') : '' }}"
                                                                        aria-required="true" data-parsley-minlength="2"
                                                                        data-parsley-trigger="change">
                                                                </div>
                                                                <div class="col-lg-offset-3 col-lg-6 col-sm-12 form-group">
                                                                    <div class="col-sm-offset-4 col-sm-5">
                                                                        <button class="ladda-button btn btn-sm btn-primary"
                                                                            id='ladda-session' data-style="expand-right"
                                                                            type="submit">{{ isset($fonctions) ? 'Modifier' : 'Enregistrer' }}</button>
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

    <script src="{{ asset('admin/js/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/js/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('admin/js/dualListbox/jquery.bootstrap-duallistbox.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
            $('.chosen-select').chosen({
                width: "100%"
            });
            $('.dual_select').bootstrapDualListbox({
                selectorMinimalHeight: 160
            });
            // $(".select2_demo_4").select2({
            //         placeholder: "Choisissez un mentor",
            //         allowClear: true
            //     });
            $('#bureau').change(function() {
                $('#inpute').val($(this).val());
            });
            $("#formFonction").on("submit", function(e) {
                e.preventDefault();
                add("#formFonction", '#tabCat', 'add.fonction')
            });
            $("#Updat").on("submit", function(e) {
                e.preventDefault();
                update("#Updat", '#tabCatr', 'modifierFonctions')
            });
            $("#formBureau").on("submit", function(e) {
                e.preventDefault();
                //  alert($('#bureau').val());
                if ($('#bureau').val() != '') {
                    add("#formBureau", '#tabbureau', 'add.affectation')
                } else {
                    swal({
                        title: 'Veillez selectionnez au-moins un bureau',
                        icon: 'error'
                    })
                }
            });

        });

        function load(id) {
            $(id).children('.ibox-content').toggleClass('sk-loading');
        }

        function update(form, idLoad, url) {
            var f = form;
            var loade = idLoad;
            var u = url;
            load(loade);
            $.ajax({
                url: u,
                method: "post",
                data: $(f).serialize(),
                success: function(data) {
                    load(loade);
                    if (!data.reponse) {
                        swal({
                            title: data.msg,
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

        function add(form, idLoad, url) {
            var f = form;
            var loade = idLoad;
            var u = url;
            load(loade);
            $.ajax({
                url: u,
                method: "post",
                data: $(f).serialize(),
                success: function(data) {
                    load(loade);
                    if (!data.reponse) {
                        swal({
                            title: data.msg,
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
