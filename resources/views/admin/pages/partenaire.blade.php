@extends('admin.parties.templateAdmin',['titre'=>"Gestion Partenaire"])

@section('autres_style')
    <link href="{{ asset('css/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/plugins/chosen/bootstrap-chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/parsley/parsley.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/iCheck/custom.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset(admin/'css/dualListbox/bootstrap-duallistbox.min.css') }}">
    <link href="{{ asset('admin/css/dataTables/datatables.min.css') }}" rel="stylesheet">

@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Session
                                <span class="label label-success">{{ $sessions->count() }}</span>
                            </a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#tab-2">Fidèles
                                <span class="label label-danger">{{ $fidelsall->count() }}</span>
                            </a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#tab-3">Fidèles en cour
                                <span class="label label-warning">{{ $fidelsEncour->count() }}</span>
                            </a>
                        </li>
                        <li class=""><a data-toggle="tab" href="#tab-4">Fidèles en fini
                                <span class="label label-info">{{ $fidelsFini->count() }}</span>
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    @forelse ($sessions as $s)
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapse{{ $s->id }}">
                                                        {{ $s->session }} <span
                                                            class="label label-{{ $s->etat == 'active' ? 'success' : 'warning' }}">

                                                            @if ($s->etat == 'active')
                                                                {{ 'En cours' }}
                                                            @else
                                                                @if ($s->etat == 'suspendu')
                                                                    {{ 'En suspend' }}
                                                                @else
                                                                    {{ 'Cloturer' }}
                                                                @endif
                                                            @endif
                                                        </span></a>
                                                </h5>
                                                @if ($s->etat != 'active')
                                                    <div class="ibox-tools">
                                                        <a class="btn btn-default btn-xs btn-rounded" id="ouvrir"
                                                            href=" {{ $s->id }} " tyle="color: #fff">Ouvrir la
                                                            session
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </div>

                                                @endif
                                                @if ($s->etat == 'active')
                                                    <div class="ibox-tools">
                                                        <a class="btn btn-info btn-xs btn-rounded" id="suspendre"
                                                            href=" {{ $s->id }} " style="color: #fff">Suspendre la
                                                            session
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-danger btn-xs btn-rounded" id="cloturer"
                                                            href=" {{ $s->id }} "
                                                            tyle="color:#FFF !important">Cloturer la session
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </div>
                                                @endif

                                            </div>

                                            <div id="collapse{{ $s->id }}"
                                                class="panel-collapse collapse {{ $loop->first ? 'in' : '' }}">
                                                <div class="panel-body">
                                                    <p><b>Date :</b> Du
                                                        {{ \Carbon\Carbon::parse($s->debut)->isoFormat('LL') }}</span>
                                                        au {{ \Carbon\Carbon::parse($s->fin)->isoFormat('LL') }}</p>
                                                    <p>
                                                        <b>
                                                            Description :
                                                        </b>
                                                    </p>
                                                    <p>
                                                        {{ $s->description }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty

                                    @endforelse

                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nom-Prenom</th>
                                                <th>Sexe</th>
                                                <th>Telephone</th>
                                                <th>email</th>
                                                <th>lieu et date</th>
                                                <th>Etat civil</th>
                                                <th>Baptisé</th>
                                                <th>Commune</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($fidels as $i)
                                                <tr class="gradeX">
                                                    <td><a href="#contact-{{ $i->id }}"
                                                            class="client-link">{{ $i->prenom . '-' . $i->nom }}</a></td>
                                                    <td> {{ $i->sexe == 'H' ? 'HOMME' : 'FEMME' }}</td>
                                                    <td> {{ $i->phone }}</td>
                                                    <td> {{ $i->email }}</td>
                                                    <td> {{ $i->lieu . ' ' . \Carbon\Carbon::parse($i->datenaissance)->isoFormat('LL') }}
                                                    </td>
                                                    <td>{{ $i->etatCivil }}</td>
                                                    <td> {{ $i->baptiser == '0' ? 'NON' : 'OUI' }}</td>
                                                    <td>{{ $i->commune }}</td>
                                                </tr>

                                            @empty
                                                <div class='wrapper-content  animated fadeInRight'>
                                                    <div class="row mt-5">
                                                        <div class='col-lg-6 col-md-push-4 col-sm-12'>
                                                            <p class="center small text-center  badge badge-danger">
                                                                Aucun fidèle enregistrer
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforelse

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nom-Prenom</th>
                                                <th>Sexe</th>
                                                <th>Telephone</th>
                                                <th>email</th>
                                                <th>lieu et date</th>
                                                <th>Etat civil</th>
                                                <th>Baptisé</th>
                                                <th>Commune</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nom-Prenom</th>
                                                <th>Sexe</th>
                                                <th>Telephone</th>
                                                <th>email</th>
                                                <th>lieu et date</th>
                                                <th>Etat civil</th>
                                                <th>Baptisé</th>
                                                <th>Commune</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($fidelsEncour as $i)
                                                <tr class="gradeX">
                                                    <td><a href="#contact-{{ $i->id }}"
                                                            class="client-link">{{ $i->prenom . '-' . $i->nom }}</a></td>
                                                    <td> {{ $i->sexe == 'H' ? 'HOMME' : 'FEMME' }}</td>
                                                    <td> {{ $i->phone }}</td>
                                                    <td> {{ $i->email }}</td>
                                                    <td> {{ $i->lieu . ' ' . \Carbon\Carbon::parse($i->datenaissance)->isoFormat('LL') }}
                                                    </td>
                                                    <td>{{ $i->etatCivil }}</td>
                                                    <td> {{ $i->baptiser == '0' ? 'NON' : 'OUI' }}</td>
                                                    <td>{{ $i->commune }}</td>
                                                </tr>

                                            @empty
                                                <div class='wrapper-content  animated fadeInRight'>
                                                    <div class="row mt-5">
                                                        <div class='col-lg-6 col-md-push-4 col-sm-12'>
                                                            <p class="center small text-center  badge badge-danger">
                                                                Aucun fidèle enregistrer
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforelse

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nom-Prenom</th>
                                                <th>Sexe</th>
                                                <th>Telephone</th>
                                                <th>email</th>
                                                <th>lieu et date</th>
                                                <th>Etat civil</th>
                                                <th>Baptisé</th>
                                                <th>Commune</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nom-Prenom</th>
                                                <th>Sexe</th>
                                                <th>Telephone</th>
                                                <th>email</th>
                                                <th>lieu et date</th>
                                                <th>Etat civil</th>
                                                <th>Baptisé</th>
                                                <th>Commune</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($fidelsFini as $i)
                                                <tr class="gradeX">
                                                    <td><a href="#contact-{{ $i->id }}"
                                                            class="client-link">{{ $i->prenom . '-' . $i->nom }}</a></td>
                                                    <td> {{ $i->sexe == 'H' ? 'HOMME' : 'FEMME' }}</td>
                                                    <td> {{ $i->phone }}</td>
                                                    <td> {{ $i->email }}</td>
                                                    <td> {{ $i->lieu . ' ' . \Carbon\Carbon::parse($i->datenaissance)->isoFormat('LL') }}
                                                    </td>
                                                    <td>{{ $i->etatCivil }}</td>
                                                    <td> {{ $i->baptiser == '0' ? 'NON' : 'OUI' }}</td>
                                                    <td>{{ $i->commune }}</td>
                                                </tr>

                                            @empty
                                                {{-- <div class='wrapper-content  animated fadeInRight'>
                                            <div class="row mt-5">
                                                <div class='col-lg-6 col-md-push-4 col-sm-12'>
                                                    <p class="center small text-center  badge badge-danger">
                                                        Aucun fidèle enregistrer
                                                    </p>
                                                </div>
                                            </div>
                                        </div> --}}
                                            @endforelse

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nom-Prenom</th>
                                                <th>Sexe</th>
                                                <th>Telephone</th>
                                                <th>email</th>
                                                <th>lieu et date</th>
                                                <th>Etat civil</th>
                                                <th>Baptisé</th>
                                                <th>Commune</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
    <script src="{{ asset('admin/js/bootstrap-markdown/markdown.js') }}"></script>
    <script src="{{ asset('admin/js/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin/js/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/js/jasny/jasny-bootstrap.min.js') }}"></script>


    <script src="{{ asset('admin/js/parsley/js/parsley.js') }}"></script>
    <script src="{{ asset('admin/js/parsley/i18n/fr.js') }}"></script>

    <script src="{{ asset('admin/js/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/js/dualListbox/jquery.bootstrap-duallistbox.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('.dataTables-example').DataTable({
                language: {
                    processing: "Traitement en cours...",
                    search: "Rechercher&nbsp;:",
                    lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                    info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix: "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable: "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first: "Premier",
                        previous: "Pr&eacute;c&eacute;dent",
                        next: "Suivant",
                        last: "Dernier"
                    },
                    aria: {
                        sortAscending: ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                },
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'NewsLetter'
                    },
                    {
                        extend: 'pdf',
                        title: 'NewsLetter'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            $(document).on("click", "#ouvrir", function(e) {
                e.preventDefault();
                var id = $(this).attr("href");
                // var idv = $(this).attr("title");
                //alert(id);
                modifier(id, '../ouverture');
            });
            $(document).on("click", "#cloturer", function(e) {
                e.preventDefault();
                var id = $(this).attr("href");
                // var idv = $(this).attr("title");
                //alert(id);
                modifier(id, '../cloturer');
            });
            $(document).on("click", "#suspendre", function(e) {
                e.preventDefault();
                var id = $(this).attr("href");
                // var idv = $(this).attr("title");
                //alert(id);
                modifier(id, '../suspendre');
            });

        });


        function modifier(id, url) {

            swal({
                title: "Attention Modification",
                text: "Cette action modifira l'etat de la session, voulez-vous continuer ?",
                icon: 'warning',
                dangerMode: true,
                buttons: {
                    cancel: 'Non',
                    delete: 'OUI'
                }
            }).then(function(willDelete) {
                if (willDelete) {

                    $.ajax({
                        url: url + "/" + id,
                        method: "GET",
                        data: "",
                        success: function(data) {
                            //  load('#tab-session');
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
                                actualiser();
                            }
                        },
                    });
                } else {
                    swal({
                        title: "Action annuler",
                        icon: 'error'
                    })
                }
            });
        }

        function actualiser() {
            location.reload();
        }
    </script>
@endsection
