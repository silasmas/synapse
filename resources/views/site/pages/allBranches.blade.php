@extends("site.parties.templatedetail")

@section("content")

<!-- Services Section Start -->
<div class="rs-services style2 rs-services-style2 gray-bg pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container custom">
        <div class="row">
            @forelse ($allbranches as $b)
                  <div class="col-lg-4 col-md-6 mb-20">
                <div class="service-wrap">
                    <div class="image-part">
                        <img src="{{ asset('storage/'.$b->image) }}" alt="" height="260" width="360" style="height: 260px !important;width: 360px !important">
                    </div>
                    <div class="content-part">
                        <h3 class="title"><a href="{{ route('detailBranches', ['id'=>$b->id]) }}">{{ $b->titre }}</a></h3>
                        <div class="desc"> {!! Str::limit(strip_tags($b->description) , 500, '...') !!}</div>
                        <a href="#" class="mt-3 d-block" style="font-weight: 600">Savoir plus</a>
                    </div>
                </div>
            </div>
            @empty
                
            @endforelse
          
            
        </div>
    </div>
</div>
<!-- Services Section End -->
@endsection