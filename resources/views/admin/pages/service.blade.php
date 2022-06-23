@extends('admin.parties.templateAdmin',['titre'=>"Gestion Service"])

@section('autres_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2/select2.min.css') }}">  
@endsection
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row mb-5"style="margin-bottom:50px">
     <div class="col-md-12 text-center">
        <label for="">Afficher par branche :</label>
        <select onchange="changer(this.value)">
            <option value=""selected disabled>Selectionez une branche</option>
            @foreach ($branches as $b)
            <option value="{{ $b->id }}"{{ $b->id==$detail->id?"selected":"" }}>
                 {{ $b->titre }}</a>
            </option>        
            @endforeach
        </select>
     </div>
    </div>
    <div class="row">
        @forelse ($detail->service as $b)
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content   product-box">
                    <div class="product-imitation" style="padding: 2px 0 !important;">
                      <img src="{{ asset('storage/'.$b->cover) }}" alt=""
                      class="img-responsive" style="height: 250px !important;" height="50">
                    </div>
                    <div class="product-desc">
                        <span class="product-price">
                            {{ $b->created_at->format('d').'-'.$b->created_at->format('M')  }}
                        </span>
                        <small class="text-muted">{{ $detail->titre }}</small>
                        <a href="#" class="product-name"> {{ $b->titre }}</a>
                        <div class="small m-t-xs ">
                            @if (Str::length(strip_tags($b->description))>500)
                            {{ substr(strip_tags($b->description),0,500).'...' }}
                            {{-- {!! Str::limit($b->description, 400, '...') !!}  --}}
                            @else
                                {!! $b->description !!}
                            @endif                            
                          
                        </div>
                        <div class="m-t text-righ">
                            <a href="{{ route('viewGalerie', ['id'=>$b->id]) }}" 
                                class="btn btn-xs btn-outline btn-warning">Voir la galerie 
                                <i class="fa fa-folder"></i> </a>
                            <a href="{{ route('editService', ['id'=>$b->id]) }}" 
                                class="btn btn-xs btn-outline btn-primary">Modifier 
                                <i class="fa fa-edit"></i> </a>
                            <button onclick="supprimer('../deleteService',this.title)" title="{{ $b->id }}" 
                                class="btn btn-xs btn-outline btn-danger">Supprimer 
                                <i class="fa fa-trash"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <h2 class="text-danger text-center">Cette branche n'a pas encore des services enregistrer</h2>
        @endforelse
    </div>
</div>
@endsection
@section('autres-script')
<script src="{{ asset('admin/js/select2/select2.full.min.js') }}"></script>

<script>
    function changer(val){
        event.preventDefault()
        // alert(val)
        window.location.href="../detailBranche/"+val;
    }
</script>
@endsection