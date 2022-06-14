@extends('layouts.admin')
@section('title')
Payment Details | SET - Purchase Invoice
@endsection
@section('contents')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Payment Details</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal">Payment Details</a></li>
                </ol>
                {{-- <a href="{{url('/add-locker')}}"
                class="btn btn-success d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light
                text-white">Add lockers
                </a> --}}
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Three charts -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Payment Details <a href="#" class="btn btn-sm btn-success">Generate PDF</a></h3>
                

                @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @elseif(session('warning'))
                <div class="alert alert-danger" role="alert">
                    {{ session('warning') }}
                </div>
                @endif

                <div id="invoiceholder" style="border: 1px solid #303030">

                    <div id="headerimage"></div>
                    <div id="invoice" class="effect2">
                        <div class="header" style="text-align: center;">
                            @if($op->month == '1' )
                            <h1>Invoice - January </h1>
                            @elseif($op->month == '2' )
                            <h1>Invoice - February </h1>
                            @elseif($op->month == '3' )
                            <h1>Invoice - March </h1>
                            @elseif($op->month == '4' )
                            <h1>Invoice - April </h1>
                            @elseif($op->month == '5' )
                            <h1>Invoice - May </h1>
                            @elseif($op->month == '6' )
                            <h1>Invoice - June </h1>
                            @elseif($op->month == '7' )
                            <h1>Invoice - July </h1>
                            @elseif($op->month == '8' )
                            <h1>Invoice - August </h1>
                            @elseif($op->month == '9' )
                            <h1>Invoice - September </h1>
                            @elseif($op->month == '10' )
                            <h1>Invoice - October </h1>
                            @elseif($op->month == '11' )
                            <h1>Invoice - November </h1>
                            @else
                            <h1>Invoice - December </h1>
                            @endif
                        </div>
                        <div id="invoice-top">
                            <div class="logo"
                                style="background: url({{ asset('frontend/assets/images/logo.png') }}); width:50px;">
                            </div>
                            <div class="info">
                                <h2>SET - A Premium Laundry Services</h2>
                                <p> info@set.com <br>
                                    000-000-0000
                                </p>
                            </div>

                            @php
                            $invoice_no = date('m', strtotime($op->created_at)).'-'.$op->id;
                            $create_date = date('d-m-Y', strtotime($op->created_at));
                            $update_date = date('d-m-Y', strtotime($op->updated_at));
                            @endphp

                            <!--End Info-->
                            <div class="title">
                                <h1>Invoice #{{ $invoice_no }}</h1>
                                <p>Issued: {{ $create_date }}<br>
                                    Payment Due: {{ $update_date }}
                                </p>
                            </div>
                            <!--End Title-->
                        </div>
                        <!--End InvoiceTop-->



                        <div id="invoice-mid">

                            <div class="clientlogo" style=""></div>
                            <div class="info">
                                <h1 style="font-size: 1em;">Shipping Details</h1>
                                <h2>{{ $op->shipping_name }}</h2>
                                <p>{{ $op->shipping_email }}<br>
                                    {{ $op->shipping_phone }}<br>
                                    {{ $op->shipping_address }}
                                </p>
                            </div>

                            <div id="project">
                                <h1 style="font-size: 1em;">Billing Details</h1>
                                <h2>{{ $op->billing_name }}</h2>
                                <p>{{ $op->billing_email }}<br>
                                    {{ $op->billing_phone }}<br>
                                    {{ $op->billing_address }}
                                </p>
                                <p>Note: {{ $op->message }}</p>
                            </div>

                        </div>
                        <!--End Invoice Mid-->

                        <div id="invoice-bot">

                            <div>
                                <table class="table">
                                    <tr class="tabletitle">
                                        <td class="">
                                            <h2>Service Details</h2>
                                        </td>
                                        <td class="">
                                            <h2>Locker Details</h2>
                                        </td>
                                        <td class="">
                                            <h2>Sport Name</h2>
                                        </td>
                                        <td class="">
                                            <h2>Sub-total</h2>
                                        </td>
                                    </tr>

                                    <tr class="service">
                                        <td class="tableitem">
                                            <p class="itemtext">
                                                <b>Service:</b> {{ $op->s_name }} <br>
                                                <b>Place Service:</b> {{ $op->ps_name }} <br>
                                                <b>Service Code:</b> {{ $op->ps_code }}
                                            </p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">
                                                <b>Locker:</b> {{ $op->l_name }} <br>
                                                <b>Place Locker:</b> {{ $op->pl_name }} <br>
                                                <b>Locker Code:</b> {{ $op->pl_code }}
                                            </p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext"> {{ $op->sport_name }} </p>
                                        </td>
                                        <td class="tableitem">
                                            <p class="itemtext">{{ $op->s_price }}.00€</p>
                                        </td>
                                    </tr>

                                    <tr class="tabletitle">
                                        <td></td>
                                        <td></td>
                                        <td class="Rate">
                                            <h2>Total</h2>
                                        </td>
                                        <td class="payment">
                                            <h2>{{ $op->s_price }}.00€</h2>
                                        </td>
                                    </tr>

                                </table>
                                <br>
                            </div>
                            <!--End Table-->

                            <img src="{{ asset('frontend/assets/images/logo.png') }}"
                                alt="SET - A Premium Laundry Services" width="80px">


                            <div id="legalcopy">
                                <p class="legal"><strong>Thank you for your business!</strong> Hope to see you soon.
                                </p>
                            </div>

                        </div>
                        <!--End InvoiceBot-->
                    </div>
                    <!--End Invoice-->
                </div><!-- End Invoice Holder-->

            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);

    * {
        margin: 0;
        box-sizing: border-box;

    }

    body {
        background: #E0E0E0;
        font-family: 'Roboto', sans-serif;
        background-image: url('');
        background-repeat: repeat-y;
        background-size: 100%;
    }

    ::selection {
        background: #f31544;
        color: #FFF;
    }

    ::moz-selection {
        background: #f31544;
        color: #FFF;
    }

    h1 {
        font-size: 1.5em;
        color: #222;
    }

    h2 {
        font-size: .9em;
    }

    h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    p {
        font-size: .7em;
        color: #666;
        line-height: 1.2em;
    }

    #invoiceholder {
        width: 100%;
        height: 100%;
        padding-top: 10px;
    }

    #headerimage {
        z-index: -1;
        position: relative;
        top: -50px;
        height: 50px;
        background-image: url(http://michaeltruong.ca/images/invoicebg.jpg);
        -webkit-box-shadow: inset 0 2px 4px rgba(0, 0, 0, .15), inset 0 -2px 4px rgba(0, 0, 0, .15);
        -moz-box-shadow: inset 0 2px 4px rgba(0, 0, 0, .15), inset 0 -2px 4px rgba(0, 0, 0, .15);
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, .15), inset 0 -2px 4px rgba(0, 0, 0, .15);
        overflow: hidden;
        background-attachment: fixed;
        background-size: 1920px 80%;
        background-position: 50% -90%;
    }

    #invoice {
        position: relative;
        /* top: -290px; */
        margin: 0 auto;
        width: 700px;
        background: #FFF;
    }

    [id*='invoice-'] {
        /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
        padding: 30px;
    }

    #invoice-top {
        min-height: 120px;
    }

    #invoice-mid {
        min-height: 120px;
    }

    #invoice-bot {
        min-height: 250px;
    }

    .logo {
        float: left;
        height: 60px;
        width: 60px;
        background-size: 60px 60px;
    }

    .clientlogo {
        float: left;
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    .info {
        display: block;
        float: left;
        margin-left: 20px;
    }

    .title {
        float: right;
    }

    .title p {
        text-align: right;
    }

    #project {
        margin-left: 52%;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 5px 0 5px 15px;
        border: 1px solid #EEE
    }

    .tabletitle {
        padding: 5px;
        background: #EEE;
    }

    .service {
        border: 1px solid #EEE;
    }

    .item {
        width: 50%;
    }

    .itemtext {
        font-size: .9em;
    }

    #legalcopy {
        margin-top: 30px;
    }

    form {
        float: right;
        margin-top: 30px;
        text-align: right;
    }


    .effect2 {
        position: relative;
    }

    .effect2:before,
    .effect2:after {
        z-index: -1;
        position: absolute;
        content: "";
        bottom: 15px;
        left: 10px;
        width: 50%;
        top: 80%;
        max-width: 300px;
        background: #777;
        -webkit-box-shadow: 0 15px 10px #777;
        -moz-box-shadow: 0 15px 10px #777;
        box-shadow: 0 15px 10px #777;
        -webkit-transform: rotate(-3deg);
        -moz-transform: rotate(-3deg);
        -o-transform: rotate(-3deg);
        -ms-transform: rotate(-3deg);
        transform: rotate(-3deg);
    }

    .effect2:after {
        -webkit-transform: rotate(3deg);
        -moz-transform: rotate(3deg);
        -o-transform: rotate(3deg);
        -ms-transform: rotate(3deg);
        transform: rotate(3deg);
        right: 10px;
        left: auto;
    }



    .legal {
        width: 70%;
    }
</style>
@endsection
