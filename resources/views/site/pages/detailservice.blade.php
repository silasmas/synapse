@extends("site.parties.templatedetail")

@section("content")

     <!-- Breadcrumbs Start -->
     <div class="rs-breadcrumbs img10" style="background: url('{{ asset("storage/".$oneBranche->image) }}')">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title">
                  {{ $oneBranche->titre }}
                </h1>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Project Section Start -->
    <div class="rs-project style1 red-overly-bg pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                @forelse ($oneBranche->service as $b)
                     <div class="col-lg-4 col-md-6 mb-30">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="{{ asset('storage/'.$b->cover) }}" alt="images">
                        </div>
                        <div class="project-content">
                            <div class="project-inner">
                                <h3 class="title"><a href="{{ route('oneservice', ['id'=>$b->id]) }}">{{ $b->serviceTitre }}</a></h3>
                                <span class="category"><a href="project-single.html">Investment</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    
                @endforelse
               
                
            </div>
        </div>
    </div>
    <!-- Project Section End -->
@endsection