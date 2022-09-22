@extends('layouts.frontend')
 @section('title')
 Service | SET - A Premium Laundry Service
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

<section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Service</h6>
          @if (session('applocale') == 'en')
          <h2>{{$service->service_name}}</h2>
          @else
          <h2>{{$service->service_name_ger}}</h2>
          @endif
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="meeting-single-item">
                <div class="thumb">
                  <div class="price">
                    <span>{{$service->service_price}}.00€</span>
                  </div>
                  {{-- <div class="date">
                    <h6>Nov <span>12</span></h6>
                  </div> --}}
                  <img src="/uploads/services/{{$service->service_image}}" alt="{{$service->service_name}}">
                </div>
                <div class="down-content">
                  @if (session('applocale') == 'en')
                  <h4>{{$service->service_name}}</h4>
                  <p>{{$service->service_price}}.00€</p>
                  <br>
                  <p>{{$service->short_desc}}</p>
                  <hr>
                  {{-- <p class="description"> --}}
                  <p class="">
                    {!!$service->long_desc!!}
                  </p>
                  <br>
                 @else
                 <h4>{{$service->service_name_ger}}</h4>
                  <p>{{$service->service_price}}.00€</p>
                  <br>
                  <p>{{$service->short_desc_ger}}</p>
                  <hr>
                  {{-- <p class="description"> --}}
                  <p class="">
                    {!!$service->long_desc_ger!!}
                  </p>
                  <br>
                 @endif
                  @if(Auth::user())
                  <div class="main-button-red">
                    <a href="{{url('/order-form')}}">Order</a>
                  </div>
                  @else
                  <div class="alert alert-warning text-center">Please login or register to order this service!!!</div>
                  @endif
                </div>
              </div>
            </div>
            {{-- <div class="col-lg-12">
              <div class="main-button-red">
                <a href="meetings.html">Back To Meetings List</a>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
  </section>
  
@endsection