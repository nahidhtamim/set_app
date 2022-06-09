<!DOCTYPE html>

<html>

<head>

    <title>SET - Purchase Invoice</title>

    <style>
        
        @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
        *{
        margin: 0;
        box-sizing: border-box;

        }
        body{
        background: #E0E0E0;
        font-family: 'Roboto', sans-serif;
        background-image: url('');
        background-repeat: repeat-y;
        background-size: 100%;
        }
        ::selection {background: #f31544; color: #FFF;}
        ::moz-selection {background: #f31544; color: #FFF;}
        h1{
        font-size: 1.5em;
        color: #222;
        }
        h2{font-size: .9em;}
        h3{
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
        }
        p{
        font-size: .7em;
        color: #666;
        line-height: 1.2em;
        }

        #invoiceholder{
        width:100%;
        hieght: 100%;
        padding-top: 50px;
        }
        #headerimage{
        z-index:-1;
        position:relative;
        top: -50px;
        height: 350px;
        background-image: url('http://michaeltruong.ca/images/invoicebg.jpg');

        -webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
            -moz-box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
            box-shadow:inset 0 2px 4px rgba(0,0,0,.15), inset 0 -2px 4px rgba(0,0,0,.15);
        overflow:hidden;
        background-attachment: fixed;
        background-size: 1920px 80%;
        background-position: 50% -90%;
        }
        #invoice{
        position: relative;
        top: -290px;
        margin: 0 auto;
        width: 700px;
        background: #FFF;
        }

        [id*='invoice-']{ /* Targets all id with 'col-' */
        border-bottom: 1px solid #EEE;
        padding: 30px;
        }

        #invoice-top{min-height: 120px;}
        #invoice-mid{min-height: 120px;}
        #invoice-bot{ min-height: 250px;}

        .logo{
        float: left;
            height: 60px;
            width: 60px;
            background-size: 60px 60px;
        }
        .clientlogo{
        float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
        border-radius: 50px;
        }
        .info{
        display: block;
        float:left;
        margin-left: 20px;
        }
        .title{
        float: right;
        }
        .title p{text-align: right;}
        #project{margin-left: 52%;}
        table{
        width: 100%;
        border-collapse: collapse;
        }
        td{
        padding: 5px 0 5px 15px;
        border: 1px solid #EEE
        }
        .tabletitle{
        padding: 5px;
        background: #EEE;
        }
        .service{border: 1px solid #EEE;}
        .item{width: 50%;}
        .itemtext{font-size: .9em;}

        #legalcopy{
        margin-top: 30px;
        }
        form{
        float:right;
        margin-top: 30px;
        text-align: right;
        }


        .effect2
        {
        position: relative;
        }
        .effect2:before, .effect2:after
        {
        z-index: -1;
        position: absolute;
        content: "";
        bottom: 15px;
        left: 10px;
        width: 50%;
        top: 80%;
        max-width:300px;
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
        .effect2:after
        {
        -webkit-transform: rotate(3deg);
        -moz-transform: rotate(3deg);
        -o-transform: rotate(3deg);
        -ms-transform: rotate(3deg);
        transform: rotate(3deg);
        right: 10px;
        left: auto;
        }



        .legal{
        width:70%;
        }
    </style>

</head>

<body>

    {{-- <h1>{{ $details['title'] }}</h1>

    <p>{{ $details['body'] }}</p> --}}

    <div id="invoiceholder">

  <div id="headerimage"></div>
  <div id="invoice" class="effect2">
    <div class="header" style="text-align: center;">
      @if ($details['month'] == '1' )
      <h1>Invoice - January </h1>
      @elseif ($details['month'] == '2' )
      <h1>Invoice - February </h1>
      @elseif ($details['month'] == '3' )
      <h1>Invoice - March </h1>
      @elseif ($details['month'] == '4' )
      <h1>Invoice - April </h1>
      @elseif ($details['month'] == '5' )
      <h1>Invoice - May </h1>
      @elseif ($details['month'] == '6' )
      <h1>Invoice - June </h1>
      @elseif ($details['month'] == '7' )
      <h1>Invoice - July </h1>
      @elseif ($details['month'] == '8' )
      <h1>Invoice - August </h1>
      @elseif ($details['month'] == '9' )
      <h1>Invoice - September </h1>
      @elseif ($details['month'] == '10' )
      <h1>Invoice - October </h1>
      @elseif ($details['month'] == '11' )
      <h1>Invoice - November </h1>
      @else
      <h1>Invoice - December </h1>
      @endif
    </div>
    <div id="invoice-top">
      <div class="logo" style="background: url({{asset('frontend/assets/images/logo.png')}}); width:50px;"></div>
      <div class="info">
        <h2>SET - A Premium Laundry Services</h2>
        <p> info@set.com <br>
            000-000-0000
        </p>
      </div><!--End Info-->
      <div class="title">
        <h1>Invoice #{{ $details['invoice_no'] }}</h1>
        <p>Issued: {{ $details['create_date'] }}<br>
           Payment Due: {{ $details['update_date'] }}
        </p>
      </div><!--End Title-->
    </div><!--End InvoiceTop-->


    
    <div id="invoice-mid">
      
      <div class="clientlogo" style=""></div>
      <div class="info">
        <h1 style="font-size: 1em;">Shipping Details</h1>
        <h2>{{ $details['shipping_name'] }}</h2>
        <p>{{ $details['shipping_email'] }}<br>
            {{ $details['shipping_phone'] }}<br>
            {{ $details['shipping_address'] }}
        </p>
      </div>

      <div id="project">
        <h1 style="font-size: 1em;">Billing Details</h1>
        <h2>{{ $details['billing_name'] }}</h2>
        <p>{{ $details['billing_email'] }}<br>
            {{ $details['billing_phone'] }}<br>
            {{ $details['billing_address'] }}
        </p>
        <p>Note: {{ $details['message'] }}</p>
      </div>   

    </div><!--End Invoice Mid-->
    
    <div id="invoice-bot">
      
      <div id="table">
        <table>
          <tr class="tabletitle">
            <td class=""><h2>Service Details</h2></td>
            <td class=""><h2>Locker Details</h2></td>
            <td class=""><h2>Sport Name</h2></td>
            <td class=""><h2>Sub-total</h2></td>
          </tr>
          
          <tr class="service">
            <td class="tableitem">
                <p class="itemtext">
                    <b>Service:</b> {{ $details['s_name'] }} <br>
                    <b>Place Service:</b> {{ $details['ps_name'] }} <br>
                    <b>Service Code:</b> {{ $details['ps_code'] }}
                </p>
            </td>
            <td class="tableitem">
                <p class="itemtext">
                    <b>Locker:</b> {{ $details['l_name'] }} <br>
                    <b>Place Locker:</b> {{ $details['pl_name'] }} <br>
                    <b>Locker Code:</b> {{ $details['pl_code'] }}
                </p>
            </td>
            <td class="tableitem">
                <p class="itemtext"> {{ $details['sport_name'] }} </p>
            </td>
            <td class="tableitem">
                <p class="itemtext">{{ $details['s_price'] }}.00€</p>
            </td>
          </tr>
  
          <tr class="tabletitle">
            <td></td>
            <td></td>
            <td class="Rate"><h2>Total</h2></td>
            <td class="payment"><h2>{{ $details['s_price'] }}.00€</h2></td>
          </tr>
          
        </table>
        <br>
      </div><!--End Table-->
      
      <img src="{{asset('frontend/assets/images/logo.png')}}" alt="SET - A Premium Laundry Services" width="80px">

      
      <div id="legalcopy">
        <p class="legal"><strong>Thank you for your business!</strong>  Hope to see you soon.
        </p>
      </div>
      
    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->

</body>

</html>