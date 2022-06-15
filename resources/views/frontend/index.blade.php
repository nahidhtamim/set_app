@extends('layouts.frontend')
 @section('title')
 Home | SET - A Premium Laundry Service
 @endsection
@section('contents')

@if (session('status'))
    <div class="alert alert-success" role="alert">
         {{ session('status') }}
    </div>
@elseif (session('warning'))
    <div class="alert alert-danger" role="alert">
         {{ session('warning') }}
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
          @foreach ($services as $service)
          <div class="col-lg-6">
            <div class="meeting-item">
              <div class="thumb">
                <div class="price">
                  <span>${{$service->service_price}}.00</span>
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
                  <span>$48.00</span>
                </div>
                <a href="#"><img src="{{asset('frontend/assets/images/meeting-04.jpg')}}" alt="Student Training"></a>
              </div>
              <div class="down-content">
                <div class="date">
                  <h6><i class="fa fa-star-o" aria-hidden="true"></i>
                  </h6>
                </div>
                <a href="#"><h4>Set Custom</h4></a>
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

@endsection