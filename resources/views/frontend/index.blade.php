@extends('layouts.frontend')
 @section('title')
 Home | SET - A Premium Laundry Service
 @endsection
@section('contents')

@if (session('status'))
    <div class="alert alert-success" role="alert">
         {{ session('status') }}
         <a class="close">&times;</a>
    </div>
@elseif (session('warning'))
    <div class="alert alert-danger" role="alert">
         {{ session('warning') }}
         <a class="close">&times;</a>
    </div>    
@endif

  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
    <video autoplay id="bg-video">
        <!-- <source src="assets/images/course-video.mp4" type="video/mp4" /> -->
        <source src="{{asset('frontend/assets/images/set.mp4')}}" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="caption">
            <h6>Hello There</h6>
            <h2>{{__('messages.welcome')}}</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sapiente sint exercitationem quod, alias placeat officia excepturi laudantium facilis fuga!</p>
            <div class="main-button-red">
                <div class="scroll-to-section"><a href="#contact">{{__('messages.get_premium')}}</a></div>
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

<section class="our-facts">
  <div class="container">
    <div class="row">
      <div class="row">

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Get To Know Us Better</h2>
                </div>
                <div class="col-lg-6 about-area">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="slider text-center" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px; border-radius: 5%;">
                                {{-- <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src="{{asset('frontend/assets/images/play-icon.png')}}"
                                alt=""></a> --}}
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{asset('frontend/assets/images/about-slider/G1.png')}}"
                                                class="d-block w-100" alt="..." style="border-radius: 5%;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('frontend/assets/images/about-slider/G2.png')}}"
                                                class="d-block w-100" alt="..." style="border-radius: 5%;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('frontend/assets/images/about-slider/5.png')}}"
                                                    class="d-block w-100" alt="..." style="border-radius: 5%;">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                {{-- <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{asset('frontend/assets/images/about-slider/1.png')}}"
                                                class="d-block w-100" alt="..." style="border-radius: 5%;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('frontend/assets/images/about-slider/2.png')}}"
                                                class="d-block w-100" alt="..." style="border-radius: 5%;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('frontend/assets/images/about-slider/3.png')}}"
                                                class="d-block w-100" alt="..." style="border-radius: 5%;">
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-area-content">
                                <div class="count">About</div>
                                <div class="">

                                    <p class="text-light text-left" style="font-size: 14px;">Hi ich bin Andreas von der Firma Set, dem Sportbekleidungs-Service.
                                        Wir sind ein junges Unternehmen, welches sich zur Aufgabe gemacht hat,
                                        Sportbekleidung samt Handtücher und Unterwäsche für das anstehende Training
                                        vorzubereiten und Dir als ambitionierten Sportler oder ambitionierter
                                        Sportlerin an Ort und Stelle zu liefern.
                                        Und so geht´s..
                                        <br>
                                        Nach der Registrierung auf unserer Website hast Du Zugriff auf einen unserer
                                        Spindfächer. Vorausgesetzt ist natürlich, dass wir bei deinem Verein oder
                                        Sportstudio vertreten sind.
                                        Das Spindfach ist in zwei Bereiche unterteilt. Einen Bereich, zum
                                        Unterbringen Deiner Sportschuhe und Hygieneartikel. Im anderen Bereich
                                        befinden sich die Sachen, die nach jedem Training zur Reinigung abgeholt
                                        werden. 
                                        <br>
                                        Für unseren Service benötigst du zwei Sportoutfits. Diese können nach
                                                belieben in unserem Onlineshop zusammengestellt werden. Du kannst aber
                                                auch die Kleidung verwenden, mit der du bisher immer trainiert hast. Die
                                                Handtücher gibt es inklusive. <a href="{{url('/about')}}">Weiterlesen</a>

                                    </p>
                                    {{-- <button onclick="myFunction()" id="myBtn">Read more</button>  --}}
                                    


                                </div>
                            </div>
                        </div>
                    </div>
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
      {{-- <div class="col-lg-12">
        <div class="section-heading">
          <a class="nav-link" href="#">
            <input type="checkbox" data-id="{{ Auth::user()->id }}" name="online_status" class="js-switch" {{ Auth::user()->online_status == 1 ? 'checked' : '' }}>
          </a>
        </div>
      </div> --}}
      
      <div class="col-lg-12">
        <div class="section-heading">
          <h2>Our Offerings</h2>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="row">
          @foreach ($services as $service)
          <div class="col-lg-6">
            <div class="meeting-item">
              <div class="thumb">
                <div class="price">
                  <span>{{$service->service_price}}.00€</span>
                </div>
                <a href="meeting-details.html"><img src="/uploads/services/{{$service->service_image}}" alt="{{$service->service_name}}"></a>
              </div>
              <div class="down-content">
                <div class="date">
                  @if($service->id == 1)
                  <h6><i class="fa fa-star" aria-hidden="true"></i></h6>
                  @elseif($service->id == 2)
                  <h6><i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i></h6>
                  @elseif($service->id == 3)
                  <h6><i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i></h6>
                  @endif
                </div>
                <a href="{{url('/service/'.$service->id)}}"><h4>{{$service->service_name}}</h4></a>
                <p>{{$service->short_desc}}</p>
              </div>
            </div>
          </div>
          @endforeach
          
          <div class="col-lg-6">
            <div class="meeting-item">
              <div class="thumb">
                <div class="price">
                  <span>Contact</span>
                </div>
                <a href="#"><img src="{{asset('frontend/assets/images/meeting-04.jpg')}}" alt="Student Training"></a>
              </div>
              <div class="down-content">
                <div class="date">
                  <h6><i class="fa fa-star-o" aria-hidden="true"></i>
                  </h6>
                </div>
                <a href="#contact"><h4>Set Custom</h4></a>
                <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection