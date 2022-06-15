<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('frontend/assets/images/logo.png')}}" alt="" height="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
        Menu
      </button>        
      <div class="collapse navbar-collapse" id="navbarMain">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about')}}">About</a>
          </li>
          @if(isset(Auth::user()->name)) 
          <li class="nav-item">
            <a class="nav-link" href="#">
              <input type="checkbox" data-id="{{ Auth::user()->id }}" name="online_status" class="js-switch" {{ Auth::user()->online_status == 1 ? 'checked' : '' }}>
            </a>
          </li>
          {{-- @if(isset($online_status == '1')) 
          <li class="nav-item">
            <form action="{{url('/deactive-user')}}" method="POST">
              <input type="hidden" value="{{ Auth::user()->id }}" name="customer_id">
              <input type="hidden" value="0" name="online_status">
              <a type="submit" class=""><i class="fa fa-toggle-on text-success"></i></a>
            </form>
          </li>
          @elseif(isset($online_status == '0')) 
          <li class="nav-item">
            <form action="{{url('/deactive-user')}}" method="POST">
              <input type="hidden" value="{{ Auth::user()->id }}" name="customer_id">
              <input type="hidden" value="0" name="online_status">
              <a type="submit" class=""><i class="fa fa-toggle-on text-success"></i></a>
            </form>
          </li>
          @endif --}}
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{url('/my-profile')}}">Profile</a></li>
              <li><a class="dropdown-item" href="{{url('/my-orders')}}">Order</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            </ul>
          </li>
          @else
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login/Register</a>
          </li> --}}
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