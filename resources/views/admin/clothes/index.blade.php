@extends('layouts.admin')
 @section('title')
 Clothes - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Clothes
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#locationModal">
                                Services Cycle Locations
                            </button>
                        </h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/clothes')}}" class="fw-normal">Clothes</a></li>
                            </ol>
                            <a href="{{url('/add-cloth')}}"
                                class="btn btn-success pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add Cloth
                                </a>
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
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Clothes Table</h3>

                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('warning'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('warning') }}
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">RFID Code</th>
                                            <th class="border-top-0">Customer</th>
                                            <th class="border-top-0">Order Info</th>
                                            <th class="border-top-0">Service & Cloting Set</th>
                                            <th class="border-top-0">Service Cycle Status</th>
                                            <th class="border-top-0">Cloth Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clothes as $cloth)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$cloth->hexa_code}}</td>
                                            <td>
                                                <b>Name:</b> {{$cloth->customer_inf->name}}
                                                <br>
                                                <b>DoB:</b> {{$cloth->customer_inf->dob}}
                                                <br>
                                                <b>Gender:</b> {{$cloth->customer_inf->gender}}
                                            </td>
                                            <td> 
                                                <b>Order No:</b> {{$cloth->order_id}} <br>
                                                <b>Storage:</b> 
                                                    @foreach($lockers as $locker)
                                                        @if($locker->id == $cloth->order_inf->locker_id)
                                                            {{$locker->storage_name}} 
                                                        @endif
                                                     @endforeach
                                                <br>
                                                <b>Place:</b> 
                                                    @foreach($places as $place)
                                                        @if($place->id == $cloth->order_inf->place_id)
                                                            {{$place->place_name}} 
                                                        @endif
                                                     @endforeach
                                                <br>
                                                <b>Locker:</b> 
                                                    @foreach($lockers as $locker)
                                                        @if($locker->id == $cloth->order_inf->locker_id)
                                                            {{$locker->name}} 
                                                        @endif
                                                     @endforeach
                                            </td>
                                            <td>
                                                <b>Service Name:</b> {{$cloth->service_inf->service_name}} <br>
                                                <b>Clothing Set:</b> {{$cloth->set_id}} <br>
                                            </td>
                                            <td class="text-center">
                                                @if($cloth->wash_program_number == '0')
                                                New Entry
                                                @else
                                                {{$cloth->service_cycle_location_inf->location}}
                                                @endif
                                                <br>
                                                <form method="POST" action="{{url('update-service-location-status/'.$cloth->id)}}">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <select class="form-select" name="wash_program_number" id="inputGroupSelect02">
                                                          <option selected>Update Status</option>
                                                            @foreach($locations as $location)
                                                            <option value="{{$location->id}}">{{$location->location}}</option>
                                                            @endforeach
                                                        </select>
                                                        <button class="btn btn-outline-success" type="submit">Update</button>
                                                    </div>
                                                </form>
                                                
                                            </td>
                                            <td>
                                                <a href="{{url('load-laundries/'.$cloth->set_id.'/'.$cloth->order_id.'/'.$cloth->customer_id)}}"
                                                    class="btn btn-secondary text-white">View Cloths
                                                </a>
                                            </td>
                                            <td>
                                                
                                                <a href="{{url('/edit-cloth/'.$cloth->id)}}"
                                                class="btn btn-info text-white">Edit
                                                </a>
                                                <a href="{{url('/delete-cloth/'.$cloth->id)}}"
                                                class="btn btn-danger text-white" onclick="return confirm('Are you sure to delete?')">Delete
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

              <!-- Modal -->
              <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="locationModalLabel">Services Cycle Locations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table text-nowrap table-bordered table-striped" id="table">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Serial</th>
                                    <th class="border-top-0">Locations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $location)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$location->location}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>

@endsection
        
        
    