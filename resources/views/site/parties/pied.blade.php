
        <!-- start scrollUp  -->
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- Search Modal Start -->
        <div class="modal fade search-modal" id="searchModal" tabindex="-1">
            <button type="button" class="close" data-bs-dismiss="modal">
                <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text">
                                <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->


        <!-- modernizr js -->
        <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
        <!-- jquery latest version -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <!-- op nav js -->
        <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
        <!-- isotope.pkgd.min js -->
        <script src="{{ asset('assets/js/isotope.pkgd.min.j') }}s"></script>
        <!-- owl.carousel js -->
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <!-- wow js -->
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <!-- Skill bar js -->
        <script src="{{ asset('assets/js/skill.bars.jquery.js') }}"></script>
        <!-- imagesloaded js -->
        <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
         <!-- waypoints.min js -->
        <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
        <!-- counterup.min js -->
        <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
        <!-- magnific popup js -->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Nivo slider js -->
        <script src="{{ asset('assets/inc/custom-slider/js/jquery.nivo.slider.js') }}"></script>
        <!-- pointer js -->
        {{-- <script src="{{ asset('assets/js/pointer.js') }}"></script> --}}
        <!-- contact form js -->
        <script src="{{ asset('assets/js/contact.form.js') }}"></script>
        <!-- main js -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script async src='https://stackwhats.com/pixel/6002827c949da0324b45875d2a52dd'></script>
        <script>
            $('.full-width-header .rs-header.style2 .menu-area .main-menu .rs-menu ul.nav-menu li a').click(function(){
                $('.full-width-header .rs-header.style2 .menu-area .main-menu .rs-menu ul.nav-menu li a').removeClass('active')
                $(this).addClass('active')
            })

        </script>
    </body>
</html>
