@extends('layouts.admin')
@section('title')
Lockers - SET Admin Panel
@endsection
@section('contents')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Lockers</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="{{ url('/lockers') }}" class="fw-normal">Lockers</a></li>
                </ol>
                <a href="{{ url('/add-locker') }}"
                    class="btn btn-success pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add
                    Locker
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
                <h3 class="box-title">Lockers Table</h3>

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
                                <th class="border-top-0">Locker Name</th>
                                <th class="border-top-0">Locker Size</th>
                                <th class="border-top-0">Description</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lockers as $locker)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $locker->locker_name }}</td>
                                <td>{{ $locker->locker_size }}</td>
                                <td>{!!$locker->locker_description!!}</td>
                                <td>
                                    @if($locker->locker_status == 1)
                                    Active 
                                    <a href="{{url('locker-deactive/'.$locker->id)}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Deactive The Locker">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                    @elseif($locker->locker_status == 0)
                                    Deactive
                                    <a href="{{url('locker-active/'.$locker->id)}}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Active The Locker">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/edit-locker/'.$locker->id) }}"
                                        class="btn btn-info text-white">Edit
                                    </a>
                                    <a href="{{ url('/delete-locker/'.$locker->id) }}"
                                    class="btn btn-danger text-white" onclick="return confirm('Are you sure to delete?')">Delete
                                    </a>
                                    {{-- {{ $locker->created_at->diffForHumans() }} --}}
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


@endsection