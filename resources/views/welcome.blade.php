<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>SET - A Premium Laundry Service</title>

    {{-- <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/lightbox.css')}}">
    <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    {{-- <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>


    </style>

  </head>

<body>

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="https://reezhdesign.com"><img src="{{asset('frontend/assets/images/logo.png')}}" alt="" height="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
        Menu
      </button>        
      <div class="collapse navbar-collapse" id="navbarMain">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Services
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
      <video autoplay muted loop id="bg-video">
          <!-- <source src="assets/images/course-video.mp4" type="video/mp4" /> -->
          <source src="{{asset('frontend/assets/images/YouTube.mp4')}}" type="video/mp4" />
      </video>

      <div class="video-overlay header-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="caption">
              <h6>Hello There</h6>
              <h2>Welcome to SET</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sapiente sint exercitationem quod, alias placeat officia excepturi laudantium facilis fuga!</p>
              <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#contact">Get Your Premium Service Now</a></div>
              </div>
          </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-service-item owl-carousel">
          
            <div class="item">
              <!-- <div class="icon">
                <img src="assets/images/service-icon-01.png" alt="">
              </div> -->
              <div class="down-content">
                <h4>Best Services</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>
            
            <div class="item">
              <!-- <div class="icon">
                <img src="assets/images/service-icon-02.png" alt="">
              </div> -->
              <div class="down-content">
                <h4>On Time Delivery</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>
            
            <div class="item">
              <!-- <div class="icon">
                <img src="assets/images/service-icon-03.png" alt="">
              </div> -->
              <div class="down-content">
                <h4>Premium Products</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>
            
            <div class="item">
              <!-- <div class="icon">
                <img src="assets/images/service-icon-02.png" alt="">
              </div> -->
              <div class="down-content">
                <h4>24/7 Support</h4>
                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Our Offerings</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>$22.00</span>
                  </div>
                  <a href="meeting-details.html"><img src="{{asset('frontend/assets/images/meeting-01.jpg')}}" alt="New Lecturer Meeting"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6><i class="fa fa-star" aria-hidden="true"></i>
                    </h6>
                  </div>
                  <a href="meeting-details.html"><h4>Set Basic</h4></a>
                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>$36.00</span>
                  </div>
                  <a href="meeting-details.html"><img src="{{asset('frontend/assets/images/meeting-02.jpg')}}" alt="Online Teaching"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </h6>
                  </div>
                  <a href="meeting-details.html"><h4>Set Ambition</h4></a>
                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>$14.00</span>
                  </div>
                  <a href="meeting-details.html"><img src="{{asset('frontend/assets/images/meeting-03.jpg')}}" alt="Higher Education"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                      <i class="fa fa-star" aria-hidden="true"></i>
                    </h6>
                  </div>
                  <a href="meeting-details.html"><h4>Set Pro</h4></a>
                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>$48.00</span>
                  </div>
                  <a href="meeting-details.html"><img src="{{asset('frontend/assets/images/meeting-04.jpg')}}" alt="Student Training"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                    <h6><i class="fa fa-star-o" aria-hidden="true"></i>
                    </h6>
                  </div>
                  <a href="meeting-details.html"><h4>Set Custom</h4></a>
                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-lg-12">
              <h2>A Few Facts About Our Service</h2>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content percentage">
                    <div class="count-digit">98</div>
                    <div class="count-title">Happy Customers</div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">126</div>
                    <div class="count-title">New Customers</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                <div class="col-12">
                  <div class="count-area-content new-students">
                    <div class="count-digit">2345</div>
                    <div class="count-title">Total Customers</div>
                  </div>
                </div> 
                <div class="col-12">
                  <div class="count-area-content">
                    <div class="count-digit">1</div>
                    <div class="count-title">Awards</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-6 align-self-center">
          <div class="video">
            <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src="{{asset('frontend/assets/images/play-icon.png')}}" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="contact-us" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form id="contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Let's get in touch</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="name" type="text" id="name" placeholder="YOURNAME...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">
                  </fieldset>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                      <input name="subject" type="text" id="subject" placeholder="SUBJECT...*" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="right-info">
            <ul>
              <li>
                <h6>Phone Number</h6>
                <span>010-020-0340</span>
              </li>
              <li>
                <h6>Email Address</h6>
                <span>info@set.com</span>
              </li>
              <li>
                <h6>Street Address</h6>
                <span>Germany</span>
              </li>
              <li>
                <h6>Website URL</h6>
                <span>www.set.com</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 SET., Ltd. All Rights Reserved</p>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    

    <script src="{{asset('frontend/assets/js/isotope.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('frontend/assets/js/lightbox.js')}}"></script>
    <script src="{{asset('frontend/assets/js/tabs.js')}}"></script>
    <script src="{{asset('frontend/assets/js/video.js')}}"></script>
    <script src="{{asset('frontend/assets/js/slick-slider.js')}}"></script>
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
    <script>
      (function($) {
  $( window ).scroll( function () {
    if ( $(document).scrollTop() > 300 ) {
      // Navigation Bar
      $('.navbar').removeClass('fadeIn');
      $('body').addClass('shrink');
      $('.navbar').addClass('fixed-top animated fadeInDown');
    } else {
      $('.navbar').removeClass('fadeInDown');
      $('.navbar').removeClass('fixed-top');
      $('body').removeClass('shrink');
      $('.navbar').addClass('animated fadeIn');
    }
  });  
})(jQuery);
    </script>
</body>

</body>
</html>