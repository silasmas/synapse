@extends("bienvenu")

@section("content")


            <!-- Slider Start -->
            <div id="rs-slider" class="rs-slider slider3">
                <div class="bend niceties">
                    <div id="nivoSlider" class="slides">
                        <img src="{{ asset('assets/images/slides/h2-sl1.webp') }}" alt="" title="#slide-1" />
                        <img src="{{ asset('assets/images/slides/h2-sl2.webp') }}" alt="" title="#slide-2" />
                    </div>
                    <!-- Slide 1 -->
                    <div id="slide-1" class="slider-direction">
                        <div class="content-part">
                            <div class="container">
                                <div class="slider-des">
                                    <div class="sl-subtitle">Sustainable Finance</div>
                                    <h1 class="sl-title">La solution à<br>votre portée</h1>
                                </div>
                                <div class="desc">
                                    Ceux qui sont avides de répondre à vos besoins dans 
                                    le souci de vous apporter satisfaction avec plus de 
                                    10 ans d'expérience de travail acharné.
                                </div>
                                <div class="slider-bottom ">
                                    <a class="readon consultant slider" href="contact.html">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div id="slide-2" class="slider-direction">
                        <div class="content-part">
                            <div class="container">
                                <div class="slider-des">
                                    <div class="sl-subtitle">Discover your business</div>
                                    <h1 class="sl-title">La solution à<br>votre portée</h1>
                                </div>
                                <div class="desc">
                                    Ceux qui sont avides de répondre à vos besoins dans 
                                    le souci de vous apporter satisfaction avec plus de
                                     10 ans d'expérience de travail acharné.
                                </div>
                                <div class="slider-bottom ">
                                    <a class="readon consultant" href="contact.html">Discover More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider End -->

            <!-- About Section Start -->
            <div id="rs-about" class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-6 pr-70 md-pr-15 md-mb-50">
                           <div class="sec-title2 mb-30">
                                <div class="sub-text">Qui sommes nous</div>
                                <h4 class="title mb-23">Nous sommes une Entreprise des services sur <span>plusieurs domaines d'activités,
                                    avec un objectif principal de satisfaire la clientèle au travers l’optimisation des résultats.</span></h4>
                                <p class="desc mb-0">
                                    Nous œuvrons dans les domaines des solutions 
                                    TIC (Technologies de l’Information et Communication) 
                                    globales; de l'achat, l'importation, l'exportation,
                                     la commercialisation, la représentation commerciale;
                                      de L’Elevage et l’Agriculture ; de la commercialisation, 
                                      la représentation commerciale et la distribution des produits des autres sociétés.
                                </p>
                           </div>
                            <!-- Skillbar Section Start -->
                            <div class="rs-skillbar style1">
                                <div class="cl-skill-bar">
                                   <!-- Start Skill Bar -->
                                   <span class="skillbar-title">Business Consulting</span>
                                   <div class="skillbar" data-percent="92">
                                       <p class="skillbar-bar"></p>
                                       <span class="skill-bar-percent"></span>
                                   </div>
                                   <!-- Start Skill Bar -->
                                   <span class="skillbar-title">Financial Advices</span>
                                   <div class="skillbar" data-percent="90">
                                       <p class="skillbar-bar"></p>
                                       <span class="skill-bar-percent"></span>
                                   </div>
                                </div>
                                <div class="col-lg-12 mt-45">
                                    <div class="btn-part">
                                        <a class="readon consultant discover" href="about.html">Discover More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Skillbar Section End -->
                        </div>
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="{{ asset('assets/images/about-2.png') }}" alt="images">
                                <div class="working-experiance">
                                    <div class="experience-year">
                                        <div class="count-year plus"><span class="sub-text">10+</span></div>
                                        <h4 class="title mb-0">Ans d'experiences</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- About Section Start -->

            <!-- Premium Services Section Start -->
            <div class="rs-services style2 gray-bg pt-100 pb-100 md-pt-70 md-pb-70" id="rs-services">
                <div class="container">
                    <div class="sec-title2 d-flex align-items-center mb-60 md-mb-40">
                        <div class="first-half">
                            <div class="sub-text">Nos domaines d'activités</div>
                            <h2 class="title mb-0 md-pb-20">
                                Les meilleures solutions pour votre entreprise - <span> ce que nous faisons.</span></h2>
                        </div>
                        <div class="last-half">
                            <p class="desc mb-0 pl-20 md-pl-15">
                                Plus de 10 ans d'expérience dans le conseil en affaires 
                                et en finance, Solutions informatiques, en importation 
                                des biens et marchandises, en dédouanement et logistique, 
                                et collaboration avec plus de 1 000 clients dans le monde, 
                                réalisation des projets dans les domaines de l’Agriculture – Elevage – Aviculture.</p>
                        </div>
                    </div>
                    <div class="rs-carousel owl-carousel"
                        data-loop="true"
                        data-items="{{$branches->count()>=5?"3":$branches->count()}}"
                        data-margin="30"
                        data-autoplay="true"
                        data-hoverpause="true"
                        data-autoplay-timeout="5000"
                        data-smart-speed="800"
                        data-dots="true"
                        data-nav="false"
                        data-nav-speed="false"

                        data-md-device="{{$branches->count()>=5?"3":$branches->count()}}"
                        data-md-device-nav="false"
                        data-md-device-dots="true"
                        data-center-mode="false"

                        data-ipad-device2="2"
                        data-ipad-device-nav2="false"
                        data-ipad-device-dots2="true"

                        data-ipad-device="2"
                        data-ipad-device-nav="false"
                        data-ipad-device-dots="true"

                        data-mobile-device="1"
                        data-mobile-device-nav="false"
                        data-mobile-device-dots="true">

                        @forelse ($branches as $b)
                        <div class="service-wrap">
                            <div class="image-part">
                                <img src="{{ asset('storage/'.$b->image) }}" alt="" height="260" width="360" style="height: 260px !important;width: 360px !important">
                            </div>
                            <div class="content-part">
                                <h3 class="title"><a href="business-planning.html">{{ $b->titre }}</a></h3>
                                <div class="desc"> {!! Str::limit(strip_tags($b->description) , 50, '...') !!}</div>
                                <a href="#" class="mt-3 d-block" style="font-weight: 600">Savoir plus</a>
                            </div>
                        </div>
                        @empty
                            <h3 class="text-danger">Pas des branches disponible</h3>
                        @endforelse
                      
                    </div>
                    <a class="readon consultant discover mt-4" href="portfolio.html">Plus de branche</a>
                </div>
            </div>
            <!-- Process Section Start -->
            <div class="rs-process style1 bg2 pt-100 pb-100 md-pt-70 md-pb-70"
            style="background-image: url('{{asset('assets/images/ser-bg.png')}}') !important;">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-5">
                            <div class="sec-title2 md-text-center">
                                <div class="sub-text">Working Process</div>
                                <h2 class="title mb-23 white-color">How we work for our valued  <span>customers.</span></h2>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="btn-part text-right md-text-center">
                                <a class="readon consultant discover" href="portfolio.html">View Works</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container custom2">
                    <div class="process-effects-layer">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 md-mb-30">
                                <div class="rs-addon-number">
                                    <div class="number-part">
                                        <div class="number-image">
                                            <img src="{{ asset('assets/images/process/style1/1.png') }}" alt="Process">
                                        </div>
                                        <div class="number-text">
                                            <div class="number-area"> <span class="number-prefix"> 1 </span></div>
                                            <div class="number-title"><h3 class="title"> Découverte</h3></div>
                                            <div class="number-txt">
                                                Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus, in porttitor.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 md-mb-30">
                                <div class="rs-addon-number">
                                    <div class="number-part">
                                        <div class="number-image">
                                            <img src="{{ asset('assets/images/process/style1/2.png') }}" alt="Process">
                                        </div>
                                        <div class="number-text">
                                            <div class="number-area"> <span class="number-prefix"> 2 </span></div>
                                            <div class="number-title"><h3 class="title">Planification</h3></div>
                                            <div class="number-txt">
                                                Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus, in porttitor.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 sm-mb-30">
                                <div class="rs-addon-number">
                                    <div class="number-part">
                                        <div class="number-image">
                                            <img src="{{ asset('assets/images/process/style1/3.png') }}" alt="Process">
                                        </div>
                                        <div class="number-text">
                                            <div class="number-area"> <span class="number-prefix"> 3 </span></div>
                                            <div class="number-title"><h3 class="title">Exécuter</h3></div>
                                            <div class="number-txt">
                                                Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus, in porttitor.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="rs-addon-number">
                                    <div class="number-part">
                                        <div class="number-image">
                                            <img src="{{ asset('assets/images/process/style1/4.png') }}" alt="Process">
                                        </div>
                                        <div class="number-text">
                                            <div class="number-area"> <span class="number-prefix"> 4 </span></div>
                                            <div class="number-title"><h3 class="title">Livrer</h3></div>
                                            <div class="number-txt">
                                                Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus, in porttitor.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Process Section End -->
<!-- Partner Section Start -->
<div id="rs-blog" class="rs-about style1 pt-100 pb-100 md-pt-70 md-pb-70">
    <div class="container">
        <div class="sec-title2 d-flex align-items-center mb-60 md-mb-40 row justify-content-center">
            <div class="text-center col-lg-4">
                <h2 class="title mb-0 md-pb-20">
                    Nos  <span> partenaires</span></h2>
                    <p class="desc">
                        Ce qui ont accepté de  nous faire confiance
                    </p>
            </div>
        </div>
        <div class="rs-patter-section style1">
            <div class="container custom">
                <div class="rs-carousel owl-carousel"
                    data-loop="true"
                    data-items="{{$partenaires->count()>=5?"5":$partenaires->count()}}"
                    data-margin="30"
                    data-autoplay="true"
                    data-hoverpause="true"
                    data-autoplay-timeout="5000"
                    data-smart-speed="800"
                    data-dots="false"
                    data-nav="false"
                    data-nav-speed="false"

                    data-md-device="{{$partenaires->count()>=5?"5":$partenaires->count()}}"
                    data-md-device-nav="false"
                    data-md-device-dots="false"
                    data-center-mode="false"

                    data-ipad-device2="4"
                    data-ipad-device-nav2="false"
                    data-ipad-device-dots2="true"

                    data-ipad-device="3"
                    data-ipad-device-nav="false"
                    data-ipad-device-dots="false"

                    data-mobile-device="2"
                    data-mobile-device-nav="false"
                    data-mobile-device-dots="false">

                    @forelse ($partenaires as $p)
                    <div class="logo-img">
                        <a href="#">
                            <img class="hovers-logos rs-grid-img" src="{{ asset('storage/'.$p->logo) }}" title="" alt="{{ $p->titre }}">
                            <img class="mains-logos rs-grid-img " src="{{ asset('storage/'.$p->logo) }}" title="" alt="{{ $p->titre }}">
                        </a>
                    </div>
                    @empty
                    <h3 class="text-danger">Pas des partenaire disponible</h3>
                    @endforelse
                   
                  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Section End -->
            <!-- Testimonial Section Start -->
            <div  class="rs-testimonial style2 bg10 pt-100 pb-100 md-pt-70 md-pb-70"
            style="background-image: url('{{asset('assets/images/testimonial/testi-bg2.jpg')}}') !important;">
                <div class="container">
                    <div class="sec-title2 text-center md-left mb-30">
                        <div class="sub-text">Temoignages</div>
                        <h2 class="title mb-0 white-color">Que disent nos clients<br> de nous</h2>
                    </div>
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="{{ $temoignages->count()>=3?"3":"1" }}" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="{{ $temoignages->count()>=3?"3":"1" }}" data-md-device-nav="false" data-md-device-dots="true">
                    @forelse ($temoignages as $t)
                    <div class="testi-wrap"  style="background-image: url('{{asset('assets/images/testimonial/test-bg.jpg')}}') !important;">
                        <div class="item-content">
                            <span><img src="assets/images/testimonial/quote.png" alt="Testimonial"></span>
                            <p>
                             {!! Str::limit($t->description , 300, '...') !!}
                            </p>
                        </div>
                        <div class="testi-content">
                            <div class="image-wrap"  style="background-image: url('{{asset('assets/images/testimonial/test-bg.jpg')}}') !important;">
                                <img src="{{ asset('storage/'.$t->photo) }}" alt="Testimonial">
                            </div>
                            <div class="testi-information">
                                <div class="testi-name">{{ $t->prenom." ".$t->nom }}</div>
                                <span class="testi-title">{{ $t->metier }}</span>
                                <div class="ratting-img">
                                    <img src="assets/images/testimonial/ratting.png" alt="Testimonial">
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        
                    @endforelse                      
                        
                    </div>
                </div>
            </div>
            <!-- Testimonial Section End -->

            <!-- Contact Section Start -->
            <div id="rs-contact" class="rs-contact contact-style2 bg11 pt-95 pb-100 md-pt-65 md-pb-70">
                <div class="container">
                    <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                        <div class="sub-text">Contact</div>
                        <h2 class="title mb-0">Laissez-nous aider votre entreprise
                            <br>  aller  <span>de l'avant.</span></h2>
                    </div>
                    <div class="row y-middle">
                        <div class="col-lg-6 md-mb-50">
                            <div class="contact-img">
                                <img src="assets/images/computer.jpg" alt="Computer">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-wrap">
                                <div id="form-messages"></div>
                                <form id="contact-form" method="post" action="mailer.php">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                                <input class="from-control" type="text" id="name" name="name" placeholder="Nom" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                                <input class="from-control" type="text" id="email" name="email" placeholder="E-Mail" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                                <input class="from-control" type="text" id="phone" name="phone" placeholder="Numéro de téléphone" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                                <input class="from-control" type="text" id="Website" name="subject" placeholder="Votre site web" required="">
                                            </div>

                                            <div class="col-lg-12 mb-30">
                                                <textarea class="from-control" id="message" name="message" placeholder="Votre message" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="btn-part">
                                            <div class="form-group mb-0">
                                                <input class="readon submit" type="submit" value="Envoyer">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Section End -->

        </div>
        <!-- Main content End -->
@endsection
