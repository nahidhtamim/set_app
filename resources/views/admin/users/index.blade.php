@extends('layouts.admin')
@section('title')
Users - SET Admin Panel
@endsection
@section('contents')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="{{ url('/users') }}" class="fw-normal">Users</a></li>
                </ol>
                {{-- <a href="{{ url('/add-locker') }}"
                    class="btn btn-success  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">Add
                    lockers
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
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Users Table</h3>

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
                                <th class="border-top-0">Username</th>
                                <th class="border-top-0">Image</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Phone</th>
                                <th class="border-top-0">Address</th>
                                <th class="border-top-0">Created</th>
                                <th class="border-top-0">Online Status</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <img class="img-fluid img-profile rounded-circle mx-auto"
                                    src="{{ asset('/uploads/avatars/'.$user->image) }}"
                                    width="80px" alt="#" />
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($user->role_as == 1)
                                    Admin  
                                    @elseif($user->role_as == 0)
                                    Customer
                                    @endif
                                </td>
                                <td class="user-buttons">
                                    @if($user->online_status == 1)

                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-outline-offline btn-sm">
                                                <a href="{{url('user-status/offline/'.$user->id)}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Make Offline">
                                                    Offline
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-online btn-sm" disabled>
                                                <a href="{{url('user-status/online/'.$user->id)}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="User Currently Online">
                                                    Online
                                                </a>
                                            </button>
                                        </div>
                                        
                                        @elseif($user->online_status == 0)

                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" class="btn btn-offline btn-sm" disabled>
                                                <a href="{{url('user-status/offline/'.$user->id)}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="User Currently Offline">
                                                    Offline
                                                </a>
                                            </button>
                                            <button type="button" class="btn btn-outline-online btn-sm">
                                                <a href="{{url('user-status/online/'.$user->id)}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Make Online">
                                                    Online
                                                </a>
                                            </button>
                                        </div>

                                        @endif
                                </td>
                                <td>
                                    <a href="{{ url('/edit-user/'.$user->id) }}"
                                        class="btn btn-info text-white">Edit
                                    </a>
                                    {{-- <a href="{{ url('/delete-user/'.$user->id) }}"
                                    class="btn btn-danger text-white" onclick="return confirm('Are you sure to delete?')">Delete
                                    </a> --}}
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


<style>
    .user-buttons button{
        border-radius: 0px !important;
        padding: 7px  !important;
    }

    /* .user-buttons .btn-group{
        border-radius: 10px !important;
    } */

    .user-buttons button.btn-online a{
        color: #fff !important;
    }

    .user-buttons button.btn-outline-online a{
        color: #63BC62 !important;
    }

    .user-buttons button.btn-outline-online:hover a{
        color: #fff !important;
    }

    .user-buttons button.btn-offline a{
        color: #fff !important;
    }

    .user-buttons button.btn-outline-offline a{
        color: #f73333 !important;
    }

    .user-buttons button.btn-outline-offline:hover a{
        color: #fff !important;
    }

    .user-buttons button.btn-online{
        background: #63BC62 !important;
        border: 1px solid #63BC62 !important;
    }

    .user-buttons button.btn-outline-online{
        background: none !important;
        border: 1px solid #63BC62 !important;
    }

    .user-buttons button.btn-outline-online:hover{
        background: #63BC62 !important;
        border: 1px solid #63BC62 !important;
    }

    .user-buttons button.btn-offline{
        background: #f73333 !important;
        border: 1px solid #f73333 !important;
    }

    .user-buttons button.btn-outline-offline{
        background: none !important;
        border: 1px solid #f73333 !important;
    }

    .user-buttons button.btn-outline-offline:hover{
        background: #f73333 !important;
        border: 1px solid #f73333 !important;
    }
</style>


@endsection