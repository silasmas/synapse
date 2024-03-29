@include('site.parties.entete')

<div class="offwrap"></div>

<!--Preloader start here-->
<div id="pre-load">
    <div id="loader" class="loader">
        <div class="loader-container">
            <div class='loader-icon'><img src="{{ asset('assets/images/logo.png') }}" alt="Group synapse"></div>
        </div>
    </div>
</div>
<!--Preloader area end here-->

<!-- Main content Start -->
<div class="main-content">

    <!--Full width header Start-->
    <div class="full-width-header">
        <!--Header Start--> 
        <header id="rs-header" class="rs-header header-transparent">
            <!-- Topbar Area Start -->
            <div class="topbar-area style1">
                <div class="container custom">
                    <div class="row y-middle">
                        <div class="col-lg-8">
                            <div class="topbar-contact">
                                <ul>
                                    <li>
                                        <i class="flaticon-email"></i>
                                        <a href="mailto:info@groupsynapse.org">Info@groupsynapse.org</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-call"></i>
                                        <a href="tel:(+243)999930158">(+243)999930158</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-location"></i>
                                        Imm botour ogefrem-Local 14, Kin-Gombe
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 text-right">
                            <div class="toolbar-sl-share">
                                <ul>
                                    <li class="opening"> <em><i class="flaticon-clock"></i>Lundi - Vendredi / 8H30' - 15H30'</em> </li>
                                    <li><a href="https://web.facebook.com/profile.php?id=100080432703036" target="blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/synapsegroup4/" target="blank"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UCQV81mSQQcrwTe44r7BQGLA" target="blank"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar Area End -->

            <!-- Menu Start -->
            <div class="menu-area menu-sticky">
                <div class="container custom">
                    <div class="row-table">
                        <div class="col-cell header-logo">
                            <div class="logo-area">
                                <a href="{{url('/') }}">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                                    <div class="brand">
                                        <span class="text-danger">Groupe</span>
                                        <span class="d-flex">
                                            <div>Syn</div>
                                            <div>apse</div>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-cell">
                            <div class="rs-menu-area">
                                <div class="main-menu">
                                    <nav class="rs-menu hidden-md">
                                        <ul class="nav-menu">

                                            <li>
                                                <a href="{{ url('/') }}">Retour à l'accueil</a>
                                            </li>

                                        </ul> <!-- //.nav-menu -->
                                    </nav>
                                </div> <!-- //.main-menu -->
                            </div>
                        </div>
                        <div class="col-cell">
                            <div class="expand-btn-inner">
                                <ul>
                                    <li class="humburger">
                                        <a id="nav-expander" class="nav-expander bar" href="#">
                                            <div class="bar">
                                                <span class="dot1"></span>
                                                <span class="dot2"></span>
                                                <span class="dot3"></span>
                                                <span class="dot4"></span>
                                                <span class="dot5"></span>
                                                <span class="dot6"></span>
                                                <span class="dot7"></span>
                                                <span class="dot8"></span>
                                                <span class="dot9"></span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->
            <!-- Canvas Menu start -->
            <nav class="right_menu_togle hidden-md">
                <div class="close-btn">
                    <a id="nav-close" class="nav-close">
                        <div class="line">
                            <span class="line1"></span>
                            <span class="line2"></span>
                        </div>
                    </a>
                </div>
                <div class="canvas-logo">
                    <a href="{{url('/') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                        <div class="brand">
                            <span>Groupe</span>
                            <span class="d-flex">
                                <div>Syn</div>
                                <div>apse</div>
                            </span>
                        </div>
                    </a>
                </div>
                <div class="offcanvas-text">
                    <p>
                        Nous visons à transformer les potentiels de la RDC et de l'Afrique en
                        richesse stable et durable au travers nos différents secteurs
                        d’activités.
                        Nous sommes appelés à autonomiser et de soutenir les petits et
                        moyens producteurs alimentaires africains engagés dans la lutte
                        contre la pauvreté, le chômage et l'insécurité alimentaire à travers
                        notre modèle commercial principal par abonnement, une solution
                        basée sur une configuration sur base d’une répartition des dividendes
                        de manière équitable.
                    </p>
                </div>
                <div class="media-img">
                    <img src="{{ asset('assets/images/off2.jpg') }}" alt="Images">
                </div>
                <div class="canvas-contact">
                    <div class="address-area">
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-location"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Addresse</h4>
                                <em>Imm botour ogefrem-Local 14, Kin-Gombe</em>
                            </div>
                        </div>
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Email</h4>
                                <em><a href="mailto:info@groupsynapse.org">Info@groupsynapse.org</a></em>
                            </div>
                         </div>
                        <div class="address-list">
                            <div class="info-icon">
                              <i class="flaticon-call"></i>
                            </div>
                            <div class="info-content">
                              <h4 class="title">Phone</h4>
                              <em> <a href="tel:(+243)999930158">(+243)999930158</a></em>
                            </div>
                        </div>
                    </div>
                    <ul class="social">
                        <li>
                            <a href="https://web.facebook.com/profile.php?id=100080432703036" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCQV81mSQQcrwTe44r7BQGLA" target="_blank"><span><i class="fa fa-youtube"></i></span></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/synapsegroup4/" target="_blank"><span><i class="fa fa-instagram"></i></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Canvas Menu end -->

            <!-- Canvas Mobile Menu start -->
            <nav class="right_menu_togle mobile-navbar-menu" id="mobile-navbar-menu">
                <div class="close-btn">
                    <a id="nav-close2" class="nav-close">
                        <div class="line">
                            <span class="line1"></span>
                            <span class="line2"></span>
                        </div>
                    </a>
                </div>
                <ul class="nav-menu">

                    <li>
                        <a href="{{url('/') }}">Retour à l'accueil</a>
                    </li>

                </ul> <!-- //.nav-menu -->
                <div class="canvas-contact">
                    <div class="address-area">
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-location"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Address</h4>
                                <em>05 kandi BR. New York</em>
                            </div>
                        </div>
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Email</h4>
                                <em><a href="mailto:support@rstheme.com">support@rstheme.com</a></em>
                            </div>
                        </div>
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Phone</h4>
                                <em>+019988772</em>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Canvas Menu end -->
        </header>
        <!--Header End-->
    </div>
    <!--Full width header End-->
@if (isset($allbranches))
    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img6" style="background: url('{{ asset('assets/images/inr_6.jpg') }}')">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title">
                    Toutes les branches
                </h1>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->
@endif
    
    @yield('content')

    <style>
        .rs-contact.main-home .contact-icons-style.box-address.box-style2 .contact-item {
  background-image: url({{ asset('assets/images/contact/box-bg3.png') }});
}
    </style>
    <!-- Contact Icon Section Start -->
    <div class="rs-contact main-home">
        <div class="container">
            <div class="contact-icons-style box-address box-style2 pt-100 md-pt-70">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 md-mb-30">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('assets/images/contact/icons/1.png') }}" alt="images">
                            </div>
                            <div class="content-text">
                                <h2 class="title"><a href="#">Notre succursale </a></h2>
                                <p class="services-txt">55 Gerad Lane,<br>
                                    NY 11201, USA</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-md-6 col-sm-6 md-mb-30">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('assets/images/contact/icons/2.png') }}" alt="images">
                            </div>
                            <div class="content-text">
                                <h2 class="title"><a href="#">Notre adresse</a></h2>
                                <p class="services-txt">Ta-134/A, Link Road, Gulshan-1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 xs-mb-30">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('assets/images/contact/icons/3.png') }}" alt="images">
                            </div>
                            <div class="content-text">
                                <h2 class="title"><a href="#">Adresse mail</a></h2>
                                <a href="mailto:test@gamil.com">test@gamil.com</a><br>
                                <a href="mailto:test2@gamil.com">test2@gamil.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <img src="{{ asset('assets/images/contact/icons/4.png') }}" alt="images">
                            </div>
                            <div class="content-text">
                                <h2 class="title"><a href="#">Contact</a></h2>
                                <a href="tel:(+088)589-8745">(+088) 589-8745</a>
                                <a href="tel:(+088)222-9999">(+088) 222-9999</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <!-- Contact Icon Section End -->
</div>
<!-- Contact Section End -->


</div>
<!-- Main content End -->



@include('site.parties.footer')
@include('site.parties.pied')
