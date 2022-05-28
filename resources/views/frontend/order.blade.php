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
                                    <table id="table" class="display table table-stripped table-bordered" style="width:100%">
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
                                                <td>{{$order->u_name}}</td>
                                                <td>{{$order->sport_name}}</td>
                                                <td>
                                                    <b>Service:</b> {{$order->s_name}} <br>
                                                    <b>Place Service:</b> {{$order->ps_name}} <br>
                                                    <b>Service Code:</b> {{$order->ps_code}}
                                                </td>
                                                <td>
                                                    <b>Locker:</b> {{$order->l_name}} <br>
                                                    <b>Place Locker:</b> {{$order->pl_name}} <br>
                                                    <b>Locker Code:</b> {{$order->pl_code}}
                                                </td>
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
                                                <td>{{$order->s_price}}</td>
                                                <td>{{$order->order_status}}</td>
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


<style>
    .dataTables_length label{
        padding-bottom: 20px;
        text-align: center;
    }
    
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #aaa;
        border-radius: 20px;
        padding: 5px;
        background-color: transparent;
        padding: 4px;
    }
    .order-form #order-form select {
        width: 35%;
        height: 30px;
        border-radius: 20px;
        background-color: #f7f7f7;
        outline: none;
        border: 1px solid #aaa;
        box-shadow: none;
        font-size: 13px;
        font-weight: 500;
        color: #252525;
        padding: 0px 15px;
        margin-bottom: 0px;
    }

    .dataTables_filter label{
        text-align: center;
    }
    .order-form #order-form input{
        width: 60%;
        height: 30px;
        border-radius: 20px;
        background-color: #f7f7f7;
        outline: none;
        border: 1px solid #aaa;
        box-shadow: none;
        font-size: 13px;
        font-weight: 500;
        color: #252525;
        padding: 0px 15px;
        margin-bottom: 0px;
    }
</style>

@endsection