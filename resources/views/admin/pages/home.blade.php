@extends('admin.parties.templateAdmin',['titre'=>"Gestion Banche"])


@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        @forelse ($branches as $b)
        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-content   product-box">
                    <div class="product-imitation" style="padding: 2px 0 !important;">
                      <img src="storage/{{ $b->image}}" alt=""
                      class="img-responsive" style="height: 250px !important;" height="50">
                    </div>
                    <div class="product-desc">
                        <span class="product-price">
                            {{ $b->created_at->format('d').'-'.$b->created_at->format('M')  }}
                        </span>
                        {{-- <small class="text-muted">Category</small> --}}
                        <a href="{{ route('detailBranche', ['id'=>$b->id]) }}" class="product-name"> {{ $b->titre }}</a>
                       
                        <div class="small m-t-xs ">
                            @if (Str::length(strip_tags($b->description))>500)
                            {{ substr(strip_tags($b->description),0,500).'...' }}
                            {{-- {!! Str::limit($b->description, 400, '...') !!}  --}}
                            @else
                                {!! $b->description !!}
                            @endif                            
                          
                        </div>
                        <div class="m-t text-righ">
                            <a href="{{ route('detailBranche', ['id'=>$b->id]) }}" class="btn btn-xs btn-outline btn-primary">Voir les services <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                        <div class="m-t text-righ">
                            <a href="{{ route('editBrance', ['id'=>$b->id]) }}" class="btn btn-xs btn-outline btn-warning">Modifier 
                                <i class="fa fa-edit"></i> </a>
                            <button onclick="supprimer('deleteBranche',this.title)" title="{{ $b->id }}" class="btn btn-xs btn-outline btn-danger">Supprimer 
                                <i class="fa fa-trash"></i> </button>
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
<script src="{{ asset('admin/js/dotdotdot/jquery.dotdotdot.min.js') }}"></script>
<script>

    $(document).ready(function (){

        $(".truncate").dotdotdot({
            watch: 'window'
        });

        $(".truncate1").dotdotdot({
            watch: 'window',
            ellipsis: ' ///...'
        });

        $(".truncate2").dotdotdot({
            watch: 'window',
            wrap: 'letter'
        });

    });

</script>
@endsection