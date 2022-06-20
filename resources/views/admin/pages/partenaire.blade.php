@extends('admin.parties.templateAdmin',['titre'=>"Gestion Partenaire"])


@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        @forelse ($partenaires as $b)
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content   product-box">
                    <div class="product-imitation" style="padding: 2px 0 !important;">
                      <img src="{{ asset('storage/'.$b->logo) }}" alt=""
                      class="img-responsive" style="height: 250px !important;" height="50">
                    </div>
                    <div class="product-desc">
                        <span class="product-price">
                            {{ $b->created_at->format('d').'-'.$b->created_at->format('M')  }}
                        </span>
                        {{-- <small class="text-muted">Category</small> --}}
                        <a href="{{ route('detailBranche', ['id'=>$b->id]) }}" class="product-name"> {{ $b->titre }}</a>
                       
                        
                        <div class="m-t text-righ">
                            <button onclick="supprimer('deletePartenaire',this.title)" title="{{ $b->id }}" class="btn btn-xs btn-outline btn-danger">Supprimer
                                <i class="fa fa-trash"></i> </button>
                                <a href="{{ route('editPartenaire', ['id'=>$b->id]) }}" class="btn btn-xs btn-outline btn-warning">Modifier 
                                    <i class="fa fa-edit"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            
        @endforelse
    </div>
</div>

@endsection
@section('autres-script')
 
@endsection
