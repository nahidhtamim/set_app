<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/dashboard')}}"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/notifications')}}"
                        aria-expanded="false">
                        <i class="far fa-bell" aria-hidden="true"></i>
                        <span class="hide-menu">Notifications</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/sports')}}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Sports">
                        <i class="fa fa-futbol" aria-hidden="true"></i>
                        <span class="hide-menu">Sports</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/places')}}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Places">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span class="hide-menu">Places</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/services')}}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Services">
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span class="hide-menu">Services</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/place-services')}}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Place Services">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <i class="fa fa-tasks" aria-hidden="true"></i>
                        <span class="hide-menu">Place Services</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/lockers')}}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Lockers">
                        <i class="fa fa-archive" aria-hidden="true"></i>
                        <span class="hide-menu">Lockers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/place-lockers')}}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Place Lockers">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <i class="fa fa-archive" aria-hidden="true"></i>
                        <span class="hide-menu">Place Lockers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/orders')}}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Orders">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Orders</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/clothes')}}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Clothes">
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                        <span class="hide-menu">Clothes</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/users')}}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Users">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}"
                        aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Logout"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                {{-- <li class="sidebar-item">


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li> --}}
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="fontawesome.html"
                        aria-expanded="false">
                        <i class="fa fa-font" aria-hidden="true"></i>
                        <span class="hide-menu">Icon</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="map-google.html"
                        aria-expanded="false">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <span class="hide-menu">Google Map</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html"
                        aria-expanded="false">
                        <i class="fa fa-columns" aria-hidden="true"></i>
                        <span class="hide-menu">Blank Page</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="404.html"
                        aria-expanded="false">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span class="hide-menu">Error 404</span>
                    </a>
                </li> --}}
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>