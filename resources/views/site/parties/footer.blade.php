  <!-- Footer Start -->
  <footer id="rs-footer" class="rs-footer style1">
      <div class="footer-top">
          <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10">
                      <div class="footer-logo mb-40">
                          <a href="index.html">
                              <img src="assets/images/logo.png" alt="">
                              <span class="brand">
                                  <span>Groupe</span>
                                  <span class="d-flex">
                                      <div>Syn</div>
                                      <div>apse</div>
                                  </span>
                              </span>
                          </a>
                      </div>
                      <div class="textwidget white-color pb-40">
                          <p>
                            Nous visons à transformer les potentiels de la RDC et de l'Afrique en
                            richesse stable et durable au travers nos différents secteurs
                            d’activités.

                        </p>
                      </div>
                      <ul class="footer-social md-mb-30">
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
                  <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10 pl-55 md-pl-15">
                      <h3 class="footer-title">Nos branches</h3>
                      <ul class="site-map">

                          @forelse ($branches as $b)
                          <li><a href="{{ route('detailBranches', ['id'=>$b->id]) }}">{{ $b->titre }}</a></li>
                          
                          @empty
                              <h3 class="text-danger">Pas des branches disponible</h3>
                          @endforelse
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10">
                      <h3 class="footer-title">Nos contacts</h3>
                      <ul class="address-widget">
                          <li>
                              <i class="flaticon-location"></i>
                              <div class="desc">Imm botour ogefrem-Local 14, Kin-Gombe</div>
                          </li>
                          <li>
                              <i class="flaticon-call"></i>
                              <div class="desc">
                                <a href="tel:(+243)999930158">(+243)999930158</a>
                              </div>
                          </li>
                          <li>
                              <i class="flaticon-email"></i>
                              <div class="desc">
                                <a href="mailto:info@groupsynapse.org">Info@groupsynapse.org</a>
                              </div>
                          </li>
                          <li>
                              <i class="flaticon-clock-1"></i>
                              <div class="desc">
                                Lundi - Vendredi / 8H30' - 15H30'
                              </div>
                          </li>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-12 col-sm-12">
                      <h3 class="footer-title">Newsletter</h3>
                      <p class="widget-desc white-color">Restez à jour avec nos dernières nouvelles et produits.</p>

                      <form action="{{ route('newsletter') }}" id="newsletter" method="post" data-parsley-validate>
                          @csrf
                          <p>
                          <input type="email" name="email" placeholder="Votre adresse mail" required="" data-parsley-trigger="change">
                          <input type="submit" value="S'abonner" id="btnNews">
                        </p>
                      </form>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-bottom">
          <div class="container">
              <div class="row y-middle">

                  <div class="col-lg-12">
                      <div class="copyright text-lg-start text-center ">
                          <p>© 2022 Group synapse. Tous droits réservés.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- Footer End -->
