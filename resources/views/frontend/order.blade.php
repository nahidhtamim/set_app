@extends('layouts.frontend')
@section('title')
Order | SET - A Premium Laundry Service
@endsection
@section('contents')



<section class="meetings-page" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="order-form" id="order-form">
                    <div class="align-self-center">
                        <div class="row">
                            <div id="order-form">
                                @csrf
                                <div class="row">
                                    <div id="info text-center">
                                        <p></p>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @elseif (session('warning'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('warning') }}
                                        </div>    
                                    @endif
                                    
                                    <div class="col-lg-12">
                                        <h2>Shipping Details</h2>
                                    </div>
                                    <div class="col-lg-12">
                                    <table  class="display table table-stripped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Customer</th>
                                                <th>Sport</th>
                                                <th>Service</th>
                                                <th>Locker</th>
                                                <th>Shipping</th>
                                                <th>Billing</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($orders as $order)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$order->customer_id}}</td>
                                                <td>{{$order->sport_id}}</td>
                                                <td>{{$order->service_id}}</td>
                                                <td>{{$order->locker_id}}</td>
                                                <td>
                                                  <b>Name:</b> {{$order->shipping_name}} <br>
                                                  <b>Email:</b> {{$order->shipping_email}} <br>
                                                  <b>Phone:</b> {{$order->shipping_phone}} <br>
                                                  <b>Address:</b> {{$order->shipping_address}}
                                                </td>
                                                <td>
                                                  <b>Name:</b> {{$order->billing_name}} <br>
                                                  <b>Email:</b> {{$order->billing_email}} <br>
                                                  <b>Phone:</b> {{$order->billing_phone}} <br>
                                                  <b>Address:</b> {{$order->billing_address}}
                                                </td>
                                                <td>{{$order->service_id}}</td>
                                                <td>{{$order->customer_id}}</td>
                                                <td>{{$order->customer_id}}</td>

                                            </tr>
                                          @endforeach

                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-12">
              <div class="main-button-red">
                <a href="meetings.html">Back To Meetings List</a>
              </div>
            </div> --}}
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</section>

@endsection