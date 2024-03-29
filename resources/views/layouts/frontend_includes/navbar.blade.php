<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('frontend/assets/images/logo.png')}}" alt="" height="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
        Menu
      </button>        
      <div class="collapse navbar-collapse" id="navbarMain">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
          
          @if(isset(Auth::user()->name)) 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user"></i> Hello, {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{url('/status')}}">Status</a></li>
              <li><a class="dropdown-item" href="{{url('/my-profile')}}">{{__('messages.profile')}}</a></li>
              <li><a class="dropdown-item" href="{{url('/my-orders')}}">{{__('messages.order')}}</a></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{__('messages.logout')}}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">{{__('messages.home')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}"  data-bs-toggle="modal" data-bs-target="#exampleModal">{{__('messages.imprint')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about')}}">{{__('messages.about')}}</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>