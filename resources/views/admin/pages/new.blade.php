@extends('admin.parties.templateAdmin',['titre'=>"news letter"])


@section('autres_style')
    <link href="{{ asset('admin/css/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox">
                <div class="ibox-content">
                    <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>
                    <h2>Liste des inscrits à la news letter</h2>
   
                    <div class="clients-list">
                    <ul class="nav nav-tabs">
                        <span class="pull-right small text-muted">{{ $news->count() }} Elements</span>
                        <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Users</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>email</th>
                                                <th>Date d'inscription</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($news as $i)
                                                <tr class="gradeX">
                                                    <td>  <img alt="image" class="img-circle" src="{{ asset('admin/img/default.png') }}"
                                                        style="width: 50px; height:50px"></td>
                                                    <td> {{ $i->email }}</td>
                                                    <td> {{ $i->lieu . ' ' . \Carbon\Carbon::parse($i->datenaissance)->isoFormat('LLL') }}
                                                    </td>
                                                </tr>
                                            @empty
                                               
                                            @endforelse

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Photo</th>
                                                <th>email</th>
                                                <th>Date d'inscription</th>
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
       
    </div>
</div>

@endsection

@section('autres-script')
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

        });
    </script>
@endsection
