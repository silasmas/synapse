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
                              We denounce with righteous indig nation in and dislike men who are
                              so beguiled and to demo realized by the, so blinded by desire, that
                              they cannot foresee.</p>
                      </div>
                      <ul class="footer-social md-mb-30">
                          <li>
                              <a href="#" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
                          </li>
                          <li>
                              <a href="# " target="_blank"><span><i class="fa fa-twitter"></i></span></a>
                          </li>

                          <li>
                              <a href="# " target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a>
                          </li>
                          <li>
                              <a href="# " target="_blank"><span><i class="fa fa-instagram"></i></span></a>
                          </li>

                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10 pl-55 md-pl-15">
                      <h3 class="footer-title">Our Services</h3>
                      <ul class="site-map">
                          <li><a href="business-planning.html">Business planning</a></li>
                          <li><a href="tax-strategy.html">Tax strategy</a></li>
                          <li><a href="financial-advices.html">Financial advices</a></li>
                          <li><a href="insurance-strategy.html">Insurance strategy</a></li>
                          <li><a href="manage-investment.html">Manage investment</a></li>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-12 col-sm-12 md-mb-10">
                      <h3 class="footer-title">Contact Info</h3>
                      <ul class="address-widget">
                          <li>
                              <i class="flaticon-location"></i>
                              <div class="desc">Ta-134/A, Gulshan Badda<br>
                                  Link Rd, Dhaka</div>
                          </li>
                          <li>
                              <i class="flaticon-call"></i>
                              <div class="desc">
                                  <a href="tel:(+880)15569569365">(+880)155 69569 365</a>
                              </div>
                          </li>
                          <li>
                              <i class="flaticon-email"></i>
                              <div class="desc">
                                  <a href="mailto:support@rstheme.com">support@rstheme.com</a>
                              </div>
                          </li>
                          <li>
                              <i class="flaticon-clock-1"></i>
                              <div class="desc">
                                  Office Hours: 8AM - 11PM
                              </div>
                          </li>
                      </ul>
                  </div>
                  <div class="col-lg-3 col-md-12 col-sm-12">
                      <h3 class="footer-title">Newsletter</h3>
                      <p class="widget-desc white-color">Restez ?? jour avec nos derni??res nouvelles et produits.</p>
                      
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
                          <p>?? 2022 Group synapse - Soci??t?? de Conseil Inc. Tous droits r??serv??s.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- Footer End -->
