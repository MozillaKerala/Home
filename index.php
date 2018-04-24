<?php
include "header.php";
?>


        <!--========== PAGE CONTENT ==========-->
        <!-- Features -->
        <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="g-text-center--xs g-margin-b-100--xs">
                <p class="g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Welcome to mozilla kerala</p>
                <h2 class="g-font-size-32--xs g-font-size-36--md ">We are a non-profit fighting  <br> to protect the web we all love</h2>
            </div>

             <p class="text-uppercase g-color--black g-letter-spacing--3 g-margin-b-0--xs text-justify">Mozilla Kerala is a regional community under the global non-profit organization, Mozilla that is founded on the roots of Free & Open Source Software. Mozilla works to promote & develop the web and to make it a better place to be.</p>
        </div>
        <!-- End Features -->

        <!-- Parallax -->
        <div class="js__parallax-window" style="background: url(img/bkg/21.jpg) 50% 0 no-repeat fixed;">
            <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-margin-b-80--xs">
                    <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white">The new Firefox</h2>
                    <p class="text-uppercase g-color--white g-letter-spacing--3 g-margin-b-0--xs">Meet Firefox Quantum. Fast for good.</p>
                </div>
                <a href="https://www.mozilla.org/firefox/download/thanks/" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50">Download now</a>
                <p class="g-color--white-opacity"><a href="https://www.mozilla.org/en-US/privacy/firefox/"> Firefox Privacy Notice </a>
            </div>
        </div>
        <!-- End Parallax --> 
        <!-- Culture -->
        <div class="g-promo-section">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="row">
                    <div class="col-md-4 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Culture</p>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md">About</h2>
                        </div>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md">mozilla kerala</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <p class="g-font-size-18--xs text-justify">A bunch of young people who had similar interests and were working to promote and develop the web came together to achieve the common ambition of Mozilla - and that is how Mozilla Kerala was born.</p>
                        <p class="g-font-size-18--xs text-justify">Mozilla Kerala was formed after the first Community Meetup on September 8, 2013 with the motive of promoting the web and the mission of Mozilla to the Keralite masses. Since then, Mozilla Kerala has been progressing tremendously towards achieveing that goal. Mozilla Kerala has been organizing many events throughout the state of Kerala. Mozilla Kerala associates with anything related to the web. We aim to let the whole state and the country and the entire world know the importance of a free and open web, online privacy and other things that matter to an online user through our activities.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 g-promo-section__img-right--lg g-bg-position--center g-height-100-percent--md js__fullwidth-img">
                <img class="img-responsive" src="img/bkg/41.jpg" alt="Image">
            </div>
        </div>
        <!-- End Culture -->

        <!-- Subscribe -->

<?php
if (isset($_POST['submit_sub']))
                {
                    $re_mmail = $_POST['txt_eemail'];
                    
                    $inss = "INSERT INTO tbl_subscibe(sud_email) VALUES ('" . $re_mmail . "')";
                    mysqli_query($con, $inss);
                    $message = "Thank you for subscribing to Mozilla Kerala Newsletter ";
                    echo "<script type='text/javascript'>alert('$message');</script>";

                }
?>
      
        <div class="js__parallax-window" style="background: url(img/bkg/2.jpg) 50% 0 no-repeat fixed;">
            <div class="g-container--sm g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-margin-b-80--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs" >Subscribe</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md g-color--white">Join us to build a better web</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <form class="input-group"  action="#" method="post">
    
                            <input type="email" class="form-control s-form-v1__input g-radius--left-50" name="txt_eemail" placeholder="Enter your email" required="">
                                                       <span class="input-group-btn">
                                <button type="submit" name="submit_sub" class="s-btn s-btn-icon--md s-btn-icon--white-brd s-btn--white-brd g-radius--right-50"><i class="ti-arrow-right"></i></button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        <!-- End Subscribe -->

        <!-- Portfolio Filter -->
        <div class="container g-padding-y-80--xs">
            <div class="g-text-center--xs g-margin-b-40--xs">
                <h2 class="g-font-size-32--xs g-font-size-36--md">Activities</h2>
            </div>
            <div class="s-portfolio">
                <div id="js__filters-portfolio-gallery" class="s-portfolio__filter-v1 cbp-l-filters-text cbp-l-filters-center">
                    <div data-filter=".a" class="s-portfolio__filter-v1-item cbp-filter-item cbp-filter-item-active">Show All</div>
                    <div data-filter=".school" class="s-portfolio__filter-v1-item cbp-filter-item">Moz2School</div>
                    <div data-filter=".iedc" class="s-portfolio__filter-v1-item cbp-filter-item">IEDC Summit 2017</div>
                    <div data-filter=".coffee" class="s-portfolio__filter-v1-item cbp-filter-item">MozCoffee</div>
                    <div data-filter=".sprint" class="s-portfolio__filter-v1-item cbp-filter-item">Firefox Quantum Sprint</div>
                </div>
            </div>
        </div>
        <!-- End Portfolio Filter -->

        <!-- Portfolio Gallery -->
        <div class="container g-margin-b-100--xs">
            <div id="js__grid-portfolio-gallery" class="cbp">
                <!-- Item -->
                <div class="s-portfolio__item cbp-item iedc a">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/1.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">mozilla kerala @IEDC Summit 2017</h4>
                            <p class="g-color--white-opacity">by mozilla kerala</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/1.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Item -->
                <div class="s-portfolio__item cbp-item iedc">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/2.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">mozilla kerala @IEDC Summit 2017</h4>
                            <p class="g-color--white-opacity">by mozilla kerala</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/2.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Item -->
                <div class="s-portfolio__item cbp-item iedc">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/4.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">mozilla kerala @IEDC Summit 2017</h4>
                            <p class="g-color--white-opacity">by mozilla kerala</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/4.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Item -->
                <div class="s-portfolio__item cbp-item sprint">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/s11.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Firefox 57 Quantum Sprint</h4>
                            <p class="g-color--white-opacity">at Toc H Institute of Science and Technology</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/s11.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Item -->
                <div class="s-portfolio__item cbp-item sprint">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/s2.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Firefox 57 Quantum Sprint</h4>
                            <p class="g-color--white-opacity">at St. Joseph's College of Engineering and Technology</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/s2.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Item -->
                <div class="s-portfolio__item cbp-item sprint">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/s3.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Firefox 57 Quantum Sprint</h4>
                            <p class="g-color--white-opacity">at College of Engineering Kidangoor</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/s3.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Item -->
                                
                                <!-- Item -->
                <div class="s-portfolio__item cbp-item school">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/c2.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Moz2School</h4>
                            <p class="g-color--white-opacity">at St. Berchmans Higher Secondary School</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/c2.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                                <!-- Item -->
                <div class="s-portfolio__item cbp-item school">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/c3.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Moz2School</h4>
                            <p class="g-color--white-opacity">at St. Berchmans Higher Secondary School</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/c3.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                                <!-- Item -->
                <div class="s-portfolio__item cbp-item school">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/c4.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Moz2School</h4>
                            <p class="g-color--white-opacity">at St. Berchmans Higher Secondary School</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/c4.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                                <!-- Item -->
                <div class="s-portfolio__item cbp-item coffee">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/m1.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">MozCoffee for FIrefox for Windows 10</h4>
                            <p class="g-color--white-opacity">at Kozhikode</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/m1.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Item -->
                                <!-- Item -->
                <div class="s-portfolio__item cbp-item coffee">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/m2.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">Software Freedom Day with MozCoffee</h4>
                            <p class="g-color--white-opacity">at Kottayam</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/m2.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Item -->
                                <!-- Item -->
                <div class="s-portfolio__item cbp-item coffee">
                    <div class="s-portfolio__img-effect">
                        <img src="img/eve/m3.jpg" alt="Portfolio Image">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                            <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">MozCoffee</h4>
                            <p class="g-color--white-opacity">at Kochi</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                                <a href="img/eve/m3.jpg" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Item -->


            </div>
            <!-- End Portfolio Gallery -->
        </div>
        <!-- End Portfolio -->

        <!-- Testimonials -->
        <div class="js__parallax-window" style="background: url(img/bkg/12.jpg) 50% 0 no-repeat fixed;">
            <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-50--xs">Testimonials</p>
                <div class="s-swiper js__swiper-testimonials">
                    <!-- Swiper Wrapper -->
                    <div class="swiper-wrapper g-margin-b-50--xs">
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" In real Open-Source, you have the right to control your destiny. "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">Linus Torvalds / Linux Foundation</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>"Open Source is a development methodolgy, free software is a social movement. "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">Richard Stallman / President, Free Software Foundation</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" I think, fundamentally, open source does tend to be more stable software. It’s the right way to do things. "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">Linus Torvalds / Linux Foundation</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Swipper Wrapper -->

                    <!-- Arrows -->
                    <div class="g-font-size-22--xs g-color--white-opacity js__swiper-fraction"></div>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--right s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--left s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
                    <!-- End Arrows -->
                </div>
            </div>
        </div>
        <!-- End Testimonials -->

       

        <!-- News -->
        <div class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="g-text-center--xs g-margin-b-80--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Blog</p>
                <h2 class="g-font-size-32--xs g-font-size-36--md">Latest News</h2>
            </div>
            <div class="row">
                <div class="col-sm-4 g-margin-b-30--xs g-margin-b-0--md">
                    <!-- News -->
                    <article>
                        <img class="img-responsive" src="img/400x400/1.jpg" alt="Image">
                        <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
                            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">News</p>
                            <h3 class="g-font-size-22--xs g-letter-spacing--1"><a href="https://foundation.mozilla.org/opportunity/global-sprint/">Mozilla Kerala Regional Sprint 2018</a></h3>
                            <p>Mozilla’s Global Sprint is a fun, two-day collaborative hackathon. A diverse network of educators, engineers, artists, scienti...</p>
                        </div>
                    </article>
                    <!-- End News -->
                </div>
                <div class="col-sm-4 g-margin-b-30--xs g-margin-b-0--md">
                    <!-- News -->
                    <article>
                        <img class="img-responsive" src="img/400x400/2.png" alt="Image">
                        <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
                            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">News</p>
                            <h3 class="g-font-size-22--xs g-letter-spacing--1"><a href="https://blog.mozilla.org/blog/2018/03/29/mozilla-marks-20th-anniversary-commitment-better-human-experiences-online/">Mozilla marks 20th anniversary</a></h3>
                            <p>On 31st March, Mozilla marks 20th anniversary with commitment to better human experiences online</p>
                        </div>
                    </article>
                    <!-- End News -->
                </div>
                <div class="col-sm-4">
                    <!-- News -->
                    <article>
                        <img class="img-responsive" src="img/400x400/3.png" alt="Image">
                        <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
                            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">News</p>
                            <h3 class="g-font-size-22--xs g-letter-spacing--1"><a href="https://blog.mozilla.org/press/2018/02/20-big-ideas-to-connect-the-unconnected/">20 Big Ideas to Connect the Unconnected</a></h3>
                            <p>The National Science Foundation and Mozilla are supporting projects that kee...</p>
                        </div>
                    </article>
                    <!-- End News -->
                </div>
            </div>
        </div>
        <!-- End News -->




        <!-- Counter -->

         <div class="parallax" style="background: url(img/wp/2.png) 50% 0 no-repeat fixed;">
            <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-margin-b-80--xs">
                    <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-55--md g-color--white" id="demo"></h2>
                    <p class="text-uppercase g-color--white g-letter-spacing--3 g-margin-b-0--xs">Days to go. Stay tuned!</p>
                    <p class="text-uppercase g-color--white g-letter-spacing--3 g-margin-b-0--xs">mozilla Kerala Regional Sprint</p>
                </div>


<!--CountDown-->
<script>
// Set the date we're counting down to
var countDownDate = new Date("may 18, 2018 07:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>

<!--End Countdown-->

            </div>
        </div>
        <!-- End Counter -->
        <?php

        if (isset($_POST['submit']))
        {
            $re_name = $_POST['txt_name'];
            $re_mail = $_POST['txt_email'];
            $re_message = $_POST['txt_message'];
            $re_phone = $_POST['txt_phone'];


            $ins = "INSERT INTO tbl_feedback(feed_name,feed_email,feed_message,feed_phone) VALUES ('" . $re_name . "','" . $re_mail . "','" . $re_message . "','" . $re_phone . "')";
            mysqli_query($con, $ins);
            $message = "Thank you for Improving Mozilla Kerala <br> We will use your feedback to improve ourselfs ";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }
        ?>
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Feedback</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Send us a note</h2>
                </div>
                <form action="#" method="post">
                    <div class="row g-margin-b-40--xs">
                        <div class="col-sm-6 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <input type="text" name="txt_name" required="" class="form-control s-form-v2__input g-radius--50" placeholder="* Name">
                            </div>
                            <div class="g-margin-b-20--xs">
                                <input type="email" name="txt_email" requried"" class="form-control s-form-v2__input g-radius--50" placeholder="* Email">
                            </div>
                            <input type="text" name="txt_phone" required="" class="form-control s-form-v2__input g-radius--50" placeholder="* Phone">
                        </div>
                        <div class="col-sm-6">
                            <textarea class="form-control s-form-v2__input g-radius--10 g-padding-y-20--xs" required="" rows="8" name="txt_message" placeholder="* Your message"></textarea>
                        </div>
                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" name="submit" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Feedback Form -->

        <!-- Google Map -->
        <section class="s-google-map">
         <!--   <div id="js__google-container" class="s-google-container g-height-400--xs"></div> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.532104006216!2d76.3509343147983!3d10.055414274836673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080c04e3627551%3A0xeaddd199d9bbde2b!2sKerala+Technology+Innovation+Zone+(KTIZ)!5e0!3m2!1sen!2sin!4v1522419999341" width="100%" height="610" frameborder="0" style="border:0" allowfullscreen></iframe>
        </section>
        <!-- End Google Map -->
        <!--========== END PAGE CONTENT ==========-->

        <?php
        include "footer.php";
        ?>

