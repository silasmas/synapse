@extends('admin.parties.templateAdmin',['titre'=>"Messages"])


@section('content')
<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-sm-8">
            <div class="ibox">
                <div class="ibox-content">
                    <span class="text-muted small pull-right">Last modification: <i class="fa fa-clock-o"></i> 2:10 pm - 12.06.2014</span>
                    <h2>Liste des messages</h2>
   
                    <div class="clients-list">
                    <ul class="nav nav-tabs">
                        <span class="pull-right small text-muted">{{ $messages->count() }} Elements</span>
                        <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Messages</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="full-height-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            @forelse ($messages as $t)
                                                <tr>
                                            <td class="client-avatar"><img alt="image" src="{{ asset('admin/img/default.png') }}"> </td>
                                            <td><a data-toggle="tab" href="#{{$t->id }}" class="client-link">{{ $t->nom }}</a></td>
                                            <td> {{ $t->phone }}</td>                                            
                                            <td> {{ $t->email }}</td>                                            
                                            <td class="client-status text-center"><span class="label label-primary">Date d'envoie :{{ \Carbon\Carbon::parse($t->created_at)->isoFormat('LLL')  }}</span></td>
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
        <div class="col-sm-4">
            <div class="ibox ">

                <div class="ibox-content">
                    <div class="tab-content">
                        @forelse ($messages as $t)
                        <div id="{{$t->id}}" class="tab-pane {{ $loop->first?"active":"" }}">
                            <div class="row m-b-lg">
                                <div class="col-lg-12 text-center">
                                    <h2>{{$t->nom}}</h2>

                                    <div class="m-b-sm">
                                        <img alt="image" class="img-circle" src="{{ asset('admin/img/default.png') }}"
                                             style="width: 100px; height:100px">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <strong>
                                        Texte du Message
                                    </strong>

                                    <p>
                                        {!! $t->description !!}
                                    </p>
                                </div>
                            </div>
                        </div>  
                        @empty
                            
                        @endforelse                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection