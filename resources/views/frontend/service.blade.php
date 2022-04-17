@extends('layouts.frontend')
 @section('title')
 Home | SET - A Premium Laundry Service
 @endsection
@section('contents')

<section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Service</h6>
          <h2>{{$service->service_name}}</h2>
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
                    <span>${{$service->service_price}}.00</span>
                  </div>
                  {{-- <div class="date">
                    <h6>Nov <span>12</span></h6>
                  </div> --}}
                  <img src="/uploads/services/{{$service->service_image}}" alt="{{$service->service_name}}">
                </div>
                <div class="down-content">
                  <h4>{{$service->service_name}}</h4>
                  <p>${{$service->service_price}}.00</p>
                  <br>
                  <p>{{$service->short_desc}}</p>
                  <hr>
                  {{-- <p class="description"> --}}
                  <p class="">
                    {!!$service->long_desc!!}
                  </p>
                  <br>
                  @if(Auth::user())
                  <div class="main-button-red">
                    <a href="{{url('/order-form/'.$service->id)}}">Order</a>
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