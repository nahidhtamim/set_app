<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords"
        content="Laundry, Service, Sports, Gym, Football, Tennis, SET">
    <meta name="description"
        content="SET - A Premium Sports Laundry Service">
    <meta name="author" content="SET.com">
    <link href="//fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>@yield('title')</title>

    {{-- <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('frontend/assets/images/fav.ico')}}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/lightbox.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
      .close {
        margin-left: 15px;
        color: #8c8c8c;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        border-width:1px;
        border-style:solid;
        border-radius:50%;
      }

      .close:hover {
        color: black;
      }
      .dropdown-item:hover{
        background: #8c8c8c;
      }
      button.navbar-toggler{
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 5px solid #1F272B;
        font-size: 24px;
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        color: #1F272B;
        transition: 0.9s;
      }
      button.navbar-toggler:hover{
        color: #fff;
        background: #1F272B;
      }
      .captcha{
        padding-bottom: 30px;
      }
      .captcha img{
        height: 57px;
        width: 85%;
        border-radius: 5px;
      }
      .btn-refresh{
        border-radius: 50%;
      }

    </style>

    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    {{-- <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}

    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
      $(document).ready(function () {

          $('.onClosing').on('click', function (event) {
              event.preventDefault();
              const url = $(this).attr('href');
              swal({
                  title: 'Are you sure?',
                  text: "7 days prior notification is must to completely close the order.",
                  icon: "warning",
                  // buttons: ["Cancel", "Yes!"],
                  buttons: true,
                  dangerMode: true,
              }).then(function(value) {
                  if (value) {
                      swal("Order has been set for closing.", {
                          icon: "success",
                      });
                      window.location.href = url;
                  }
              });
          });
      });
    </script>    
</head>

<body>

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>{{__('messages.welcome')}}</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Config::get('languages')[App::getLocale()] }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #1F272B">
                @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
                    @endif
                @endforeach
                </div>
              </li>
              {{-- <li id="google_element">

              </li> --}}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Impressum</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--<h1>Impressum</h1>-->
            <h2>Angaben gemäß § 5 TMG:</h2>
            <p>Andreas Haffner GbR<br>Wäscheservice für Sportbekleidung<br>Andreas Haffner</p>
            <h3>Postanschrift:</h3>
            <p>Unter der Schule<br>Vaihingen an der Enz<br></p>
            <h3>Kontakt:</h3>
            <p>Telefon: +491622516704<br>E-Mail: info@de-set.com</p>
            <p></p><h3>Umsatzsteuer-Identifikationsnummer</h3>
            <p>55075/09959<br></p>
            <p><br></p>
            <p></p><h2>Hinweise zur Website</h2>
            <p></p><h2>Information gemäß § 36 VSBG</h2>
            <p>Gemäß § 36 VSBG (Verbraucherstreitbeilegungsgesetz – Gesetz über die alternative Streitbeilegung in Verbrauchersachen) erklärt der Betreiber dieser Website:</p>
            <p>Wir sind weder bereit noch verpflichtet, an Streitbeilegungsverfahren vor einer Verbraucherschlichtungsstelle teilzunehmen.</p>
            <p></p><h2>Hinweis</h2>
            <p>Die Plattform der EU zur außergerichtlichen Streitbeilegung finden Sie online unter: <a href="https://ec.europa.eu/consumers/odr/">https://ec.europa.eu/consumers/odr/</a></p>
            <p></p><p><em>Das Impressum wurde mit dem <a href="https://www.activemind.de/datenschutz/impressums-generator/">Impressums-Generator der activeMind AG</a> erstellt.</em></p>
      </div>
    </div>
  </div>
</div>
    <!-- ***** Header Area Start ***** -->
    
    @include('layouts.frontend_includes.navbar')
    
    <!-- ***** Header Area End ***** -->
    <!-- ***** Main Area Start ***** -->
    @yield('contents')
    <!-- ***** Main Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    @include('layouts.frontend_includes.footer')
    <!-- ***** Main Area End ***** -->


    
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    
    <script src="{{asset('frontend/assets/js/isotope.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl-carousel.js')}}"></script>
    <script src="{{asset('frontend/assets/js/lightbox.js')}}"></script>
    <script src="{{asset('frontend/assets/js/tabs.js')}}"></script>
    <script src="{{asset('frontend/assets/js/video.js')}}"></script>
    <script src="{{asset('frontend/assets/js/slick-slider.js')}}"></script>
    <script src="//cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
      window.onload = function(){
        document.getElementById('bg-video').play();
      }
       
    </script>
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script>
    {{-- <script>
      function loadGoogleTranslate(){
        new google.translate.TranslateElement("google_element");
      }
    </script> --}}
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var direction = section.replace(/#/, ''),
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

    <script type="text/javascript">
      $('#place_id').on('change', function () {
          get_service_by_place();
      });

      function get_service_by_place() {
          var place_id = $('#place_id').val();
          $.post('{{ route('getServices') }}', {
                  _token: '{{ csrf_token() }}',
                  place_id: place_id
              },
              function (data) {
                  $('#service_id').html(null);
                  $('#service_id').append($('<option value="">Select A Package</option>', {}));
                  for (var i = 0; i < data.length; i++) {
                      $('#service_id').append($('<option>', {
                          value: data[i].id,
                          text: data[i].name +' - '+ data[i].service_price +'€',
                      }));
                      
                  }
              });
      }
    </script>

    <script type="text/javascript">
      $('#service_id').on('change', function () {
          get_locker_by_service();
      });

      function get_locker_by_service() {
          var service_id = $('#service_id').val();
          $.post('{{ route('getLockers') }}', {
                  _token: '{{ csrf_token() }}',
                  service_id: service_id
              },
              function (data) {
                  $('#locker_id').html(null);
                  $('#locker_id').append($('<option value="">Select A Locker</option>', {}));
                  for (var i = 0; i < data.length; i++) {
                      $('#locker_id').append($('<option>', {
                          value: data[i].id,
                          text: data[i].name
                  }));
              }
        });
      }
    </script>


    <script>
      $(document).ready( function () {
        $('#table').DataTable({
            scrollX: true,
        });
      } );
    </script>

    <script>
      let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'large' });
        });
    </script>
    <script>
    $(".close").click(function() {
      $(this)
        .parent(".alert")
        .fadeOut();
    });
    </script>

    <script>
      $(document).ready(function(){
        $('.js-switch').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let userId = $(this).data('id');
            swal({
                  // title: 'Are you sure?',
                  text: "Notification will be sent to the admin about the status.",
                  icon: "info",
                  // buttons: ["Cancel", "Yes!"],
                  buttons: true,
                  // dangerMode: true,
              }).then(function(value) {
                  if (value) {
                    $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: '{{ route('users.update.status') }}',
                      data: {'online_status': status, 'user_id': userId},
                      success: function (data) {
                          swal("Notification Has Been Sent.", {
                            icon: "success",
                          });
                          // toastr.options.closeButton = true;
                          // toastr.options.closeMethod = 'fadeOut';
                          // toastr.options.closeDuration = 100;
                          // toastr.success(data.message);
                          window.location.href = url;
                      }
                  });
                      
                }
            });
            
        });
    });
    </script>  
    <script>
      $(".btn-refresh").click(function(){
        $.ajax({
          type: 'GET',
          url: '/refresh_captcha',
          success: function(data){
            $(".captcha span").html(data.captcha);
          }
        })
      })
    </script>
    </body>
</html>