@extends("site.parties.templatedetail")

@section("content")
 <!-- Breadcrumbs Start -->
 <div class="rs-breadcrumbs img4" style="background: url('{{ asset("storage/".$oneservice->cover) }}')">
    <div class="container">
        <div class="breadcrumbs-inner">
            <h1 class="page-title">
                {{ $oneservice->serviceTitre }}
                <span class="watermark"></span>
            </h1>
            <span class="sub-text"></span>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->

<!-- Slider Section Start -->
<div class="rs-slider style4 pt-100 pb-100">
    <div class="container">
        <div class="rs-carousel owl-carousel" data-loop="true" data-items="1" data-margin="0"
            data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
            data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
            data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false"
            data-ipad-device="1" data-ipad-device-nav="true" data-ipad-device-dots="false" data-ipad-device2="1"
            data-ipad-device-nav2="true" data-ipad-device-dots2="false" data-md-device="1"
            data-md-device-nav="true" data-md-device-dots="false">
            @forelse ($oneservice->galerie as $s)
            <div class="slider-img">
                <img src="{{ asset('storage/'.$s->image) }}" alt="Slider" width="1400" height="650" style="width:1400px; height:500px;">
            </div>
            @empty
               <h3 class="text-danger text-center">Pas des photos galerie</h3> 
            @endforelse
            
        </div>
    </div>
</div>
<!-- Slider Section End -->

    <!-- Project Section Start -->
    <div class="rs-project pb-110 md-pt-70 md-pb-7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-60 md-pr-15">
                    <div class="sec-title mb-64">
                        <h2 class="title title4 pb-30">
                           detail du service {{ $oneservice->serviceTitre }}
                        </h2>
                        <p class="margin-0">
                        {!! $oneservice->description !!}    
                        </p>
                    </div>
                    <!-- Counter Section End -->
                    <div class="rs-counter style1 project-single bg23" style="background: url('{{ asset("assets/images/bg/project-single-bg.jpg") }}')">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="counter-area">
                                        <div class="counter-list mb-20">
                                            <div class="counter-icon">
                                                <img src="{{ asset('assets/images/counter/icons/1.png') }}" alt="Counter">
                                            </div>
                                            <div class="counter-number">
                                                <span class="rs-count">582</span>
                                            </div>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="title">Projets réalisés pour nos clients.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="counter-area">
                                        <div class="counter-list mb-20">
                                            <div class="counter-icon">
                                                <img src="{{ asset('assets/images/counter/icons/2.png') }}" alt="Counter">
                                            </div>
                                            <div class="counter-number">
                                                <span class="rs-count">215</span>
                                                <span class="prefix">+</span>
                                            </div>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="title">Expérimenté au service des clients.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="counter-area">
                                        <div class="counter-list mb-20">
                                            <div class="counter-icon">
                                                <img src="{{ asset('assets/images/counter/icons/3.png') }}" alt="Counter">
                                            </div>
                                            <div class="counter-number">
                                                <span class="rs-count">25</span>
                                                <span class="prefix">+</span>
                                            </div>
                                        </div>
                                        <div class="content-part">
                                            <h5 class="title">Années d'expérience dans le conseil.</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Counter Section End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Project Section End -->

@endsection