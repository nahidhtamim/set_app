@extends('layouts.admin')
 @section('title')
 Laundries - SET Admin Panel
 @endsection
@section('contents')
            
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <h4 class="page-title">Laundries</h4>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-secondary text-light" data-bs-toggle="modal" data-bs-target="#washingProgramModal">Washing Program</button>
                            <button type="button" class="btn btn-secondary text-light" data-bs-toggle="modal" data-bs-target="#clothGroupModal">Cloth Group</button>
                            <button type="button" class="btn btn-secondary text-light" data-bs-toggle="modal" data-bs-target="#clothTypeModal">Cloth Type</button>
                            <button type="button" class="btn btn-secondary text-light" data-bs-toggle="modal" data-bs-target="#fabricModal">Fabric</button>
                            <button type="button" class="btn btn-secondary text-light" data-bs-toggle="modal" data-bs-target="#sportswearModal">Sportswear</button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="{{url('/laundries')}}" class="fw-normal">Places</a></li>
                            </ol>
                            <a href="{{url('/add-laundry')}}"class="btn btn-success pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add Laundry</a>
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
                            <h3 class="box-title">Laundries Table</h3>

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
                                            <th class="border-top-0">Customer</th>
                                            <th class="border-top-0">Order No</th>
                                            <th class="border-top-0">Clothing Set</th>
                                            <th class="border-top-0">Washing Program</th>
                                            <th class="border-top-0">Color Group</th>
                                            <th class="border-top-0">Cloth Type</th>
                                            <th class="border-top-0">Fabric</th>
                                            <th class="border-top-0">Sportswear Type</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($laundries as $laundry)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$laundry->user_inf->name}}</td>
                                            <td>{{$laundry->order_id}}</td>
                                            <td>{{$laundry->set_id}}</td>
                                            <td>{{$laundry->washing_program_inf->name}}</td>
                                            <td>{{$laundry->cloth_group_inf->name}}</td>
                                            <td>{{$laundry->cloth_type_inf->name}}</td>
                                            <td>{{$laundry->fabric_inf->name}}</td>
                                            <td>{{$laundry->sportswear_inf->name}}</td>
                                            <td>{!!$laundry->laundry_description!!}</td>
                                            <td>
                                                @if($laundry->status == 1)
                                                Active
                                                <a href="{{url('laundry-deactive/'.$laundry->id)}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Deactive The Laundry">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                                @elseif($laundry->status == 0)
                                                Deactive
                                                <a href="{{url('laundry-active/'.$laundry->id)}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Active The Laundry">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/edit-laundry/'.$laundry->id)}}"
                                                class="btn btn-info text-white">Edit
                                                </a>
                                                <a href="{{url('/delete-laundry/'.$laundry->id)}}"
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
            

            <!-- Washing Program Modal -->
            <div class="modal fade" id="washingProgramModal" tabindex="-1" aria-labelledby="washingProgramModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="washingProgramModalLabel">Washing Programs</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table text-nowrap table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Description</th>
                                        <th class="border-top-0">Symbol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($washing_programs as $washing_program)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$washing_program->name}}</td>
                                        <td>{{$washing_program->description}}</td>
                                        <td>{{$washing_program->symbol}}</td>
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

            <!-- Cloth Group Modal -->
            <div class="modal fade" id="clothGroupModal" tabindex="-1" aria-labelledby="clothGroupModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="clothGroupModalLabel">Cloth Groups</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table text-nowrap table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cloth_groups as $cloth_group)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$cloth_group->name}}</td>
                                        <td>{{$cloth_group->description}}</td>
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

            <!-- Cloth Type Modal -->
            <div class="modal fade" id="clothTypeModal" tabindex="-1" aria-labelledby="clothTypeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="clothTypeModalLabel">Cloth Types</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table text-nowrap table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cloth_types as $cloth_type)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$cloth_type->name}}</td>
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

            <!-- Fabric Modal -->
            <div class="modal fade" id="fabricModal" tabindex="-1" aria-labelledby="fabricModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="fabricLabel">Fabrics</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table text-nowrap table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($fabrics as $fabric)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$fabric->name}}</td>
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

            <!-- Sportswear Modal -->
            <div class="modal fade" id="sportswearModal" tabindex="-1" aria-labelledby="sportswearModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="sportswearModalLabel">Sportswears</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table text-nowrap table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sportswears as $sportswear)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sportswear->name}}</td>
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
        
        
 
        
