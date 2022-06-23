@extends('admin.parties.templateAdmin', ['titre' => 'Gestion galerie'])

@section('autres_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/blueimp/css/blueimp-gallery.min.css') }}">
@endsection
@section('content')
    <div class="wrapper wrapper-content">
        
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="file-manager">
                            <h5>Galerie <b class="label label-primary">{{ $galerie->serviceTitre }}</b></h5>
                            <a href="#" class="file-control">Images</a>
                            
                            <div class="hr-line-dashed"></div>
                            <a href="{{ route('detailBranche',["id"=>$galerie->bande_id]) }}" class="btn btn-primary btn-block">Retour sur le service</a>
                            <div class="hr-line-dashed"></div>

                            <h5>Galeries des autres services</h5>
                            <ul class="folder-list" style="padding: 0">
                                @forelse ($services as $s)
                                <li><a href="{{ route('viewGalerie', ['id'=>$s->id]) }}">
                                    <i class="fa fa-folder"></i> {{ $s->serviceTitre }}</a></li>
                                    
                                @empty
                                    
                                @endforelse
                              
                           
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lightBoxGallery">
            <div class="col-lg-9 animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                       
                            @forelse ($galerie->galerie as $g)
                            <div class="file-box">
                               <div class="file">
                                   <span class="corner"></span>
                                   
                                   <div class="image">
                                           <a href="{{ asset('storage/'.$g->image) }}" title="" data-gallery="">
                                           <img alt="image" class="img-responsive" src="{{ asset('storage/'.$g->image) }}">
                                        </a>
                                       </div>
                                       <div class="file-name">
                                           <a class="text-danger"
                                            onclick="supprimer('../deleteImg',this.title)" title="{{ $g->id }}">
                                        <i class="fa fa-trash"></i>Supprimer</a>
                                           <br />
                                           <small>{{ \Carbon\Carbon::parse($g->created_at)->isoFormat('LLL')  }}</small>
                                       </div>
   
                               </div>
                           </div>
                            @empty
                            <h2 class="text-danger text-center">Ce service n'a pas encore des images enregistrer</h2>
                            @endforelse
                    </div>
                </div>
                </div>
                <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                <div id="blueimp-gallery" class="blueimp-gallery">
                    <div class="slides"></div>
                    <h3 class="title"></h3>
                    <a class="prev">‹</a>
                    <a class="next">›</a>
                    <a class="close">×</a>
                    <a class="play-pause"></a>
                    <ol class="indicator"></ol>
                </div>

            </div>
            </div>
    </div>
@endsection
@section('autres-script')
    <script src="{{ asset('admin/js/blueimp/jquery.blueimp-gallery.min.js') }}"></script>

    <script>
        function changer(val) {
            event.preventDefault()
            // alert(val)
            window.location.href = "../detailBranche/" + val;
        }
    </script>
@endsection
