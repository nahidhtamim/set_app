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
                                    
                                    <div class="col-lg-12 text-center">
                                        <h2>Order Details</h2>
                                    </div>
                                    <div class="col-lg-12">
                                    <table id="table" class="display table table-stripped table-bordered" style="width:100%">
                                        <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Customer</th>
                                                <th>Sport</th>
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
                                                <td class="text-right">{{$order->s_price}}€</td>
                                                <td>
                                                    @if($order->order_status == 1)
                                                        <span class="text-success"> <b>Active</b> </span>
                                                    @elseif($order->order_status == 2)
                                                        <span class="text-warning"> <b>On Closing</b> </span>
                                                    @elseif($order->order_status == 3)
                                                        <span class="text-danger"> <b>Closed</b> </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Buttons">
                                                        @if($order->order_status == 1)
                                                        <a href="#" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Close The Order">
                                                            <i class="fa fa-times" aria-hidden="true"></i>
                                                        </a>
                                                        @else
                                                        <a href="#" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#detailsModal" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="detailsModalLabel">Order Details</h5>
                                                    <a href="#" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h6 class="text-center text-secondary">Service Details</h6>
                                                                <p>
                                                                    <b>Service:</b> {{$order->s_name}} <br>
                                                                    <b>Place Service:</b> {{$order->ps_name}} <br>
                                                                    <b>Service Code:</b> {{$order->ps_code}}
                                                                </p>
                                                                <br>
                                                                <h6 class="text-center text-secondary">Locker Details</h6>
                                                                <p>
                                                                    <b>Locker:</b> {{$order->l_name}} <br>
                                                                    <b>Place Locker:</b> {{$order->pl_name}} <br>
                                                                    <b>Locker Code:</b> {{$order->pl_code}}
                                                                </p>
                                                                <br>
                                                                <h6 class="text-center text-secondary">Shipping Details</h6>
                                                                <p>
                                                                    <b>Name:</b> {{$order->shipping_name}} <br>
                                                                    <b>Email:</b> {{$order->shipping_email}} <br>
                                                                    <b>Phone:</b> {{$order->shipping_phone}} <br>
                                                                    <b>Address:</b> {{$order->shipping_address}}
                                                                </p>
                                                                <br>
                                                                <h6 class="text-center text-secondary">Billing Details</h6>
                                                                <p>
                                                                    <b>Name:</b> {{$order->billing_name}} <br>
                                                                    <b>Email:</b> {{$order->billing_email}} <br>
                                                                    <b>Phone:</b> {{$order->billing_phone}} <br>
                                                                    <b>Address:</b> {{$order->billing_address}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="modal-footer">
                                                    <a href="#" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</a>
                                                    <a href="#" class="btn btn-primary btn-sm">Save changes</a>
                                                    </div> --}}
                                                </div>
                                                </div>
                                            </div>
                                            


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
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #1B2325;
        border-color: #1B2325;
    }

    .dataTables_length label{
        padding-bottom: 10px;
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
        width: 40%;
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
        width: 80%;
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
        margin-bottom: 10px;
        
    }
</style>

@endsection