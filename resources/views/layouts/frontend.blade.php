<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>@yield('title')</title>

    {{-- <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/lightbox.css')}}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
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


<script type="text/javascript">
  $('#locker_id').on('change', function () {
      get_info();
  });

  function get_info() {
      var locker_id = $('#locker_id').val();
      $.post('{{ route('getInfo') }}', {
              _token: '{{ csrf_token() }}',
              locker_id: locker_id
          },
          function (data) {
              $('#info').html(null);
              $('#info').append($('<p>Your Choice Of Service</p> <hr>', {}));
              for (var i = 0; i < data.length; i++) {
                  $('#info').append($('<p>', {
                      value: data[i].id,
                      text: '<b>Service Name:</b> '+ data[i].name + '<br><b>Locker Name:</b> ' + data[i].name +'<br><b>Service Price:</b> '+ data[i].service_price,
                  }));
              }
          });
  }
</script>

<script>
  $(document).ready( function () {
    $('#table').DataTable();
  } );
</script>

</body>
</html>