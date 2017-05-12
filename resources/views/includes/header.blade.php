<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="logo"><a href="{{ url('/')}}"><img src="{{ URL::asset('assets/images/logo.png') }}"  alt="logo"/></a></div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="social-icon">
        <ul>
          <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
          <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        </ul>
      </div>
    </div>
  </div><!--end-header-->
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
        <div class="container no-padding">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="collapse navbar-collapse no-padding" id="myNavbar">
            <ul class="nav navbar-nav">
              <li class="active home"><a href="{{ url('/home') }}"></a></li>
              <li><a href="{{ url('/about') }}">About US</a></li>
              <li class="dropdown">
              	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Posts</a>
              		<ul class="dropdown-menu" role="menu">
              			<li><a href="{{ url('/posts') }}">All Posts</a></li>
              			<li><a href="{{ url('/addpost') }}">Add New</a></li>
              		</ul>
              </li>
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Event 1</a></li>
                  <li><a href="#">Event 2</a></li>
                  <li><a href="#">Event 3</a></li>
                </ul>
              </li> -->
              <li><a href="{{ url('/contact')}}">Contacts</a></li>
             <!--  <li><a href="{{ url('/login') }}">Login</a></li>
              <li><a href="{{ url('/register') }}">Sign Up</a></li> -->
              @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                	<li><a href="{{ url('/profile') }}">Profile</a></li>
                                	<li><a href="{{ url('/profile-pic') }}">Upload Pofile pic</a></li>
                                	<li><a href="{{ url('/gallery') }}">Photos</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
              <li class="search-container">
                  <div id="imaginary_container">
                      <form name="searh_box" method="POST" action="{{ url('/search')}}" style="margin: 0px;">
                       {{ csrf_field() }}
                        <div class="input-group stylish-input-group">
                              <input name="search" type="text" class="form-control"  placeholder="" >
                              <span class="input-group-addon">
                              <button type="submit"> <span class="glyphicon glyphicon-search"></span> </button>
                              </span>
                         </div>
                    </form>
                  </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div><!--end-navbar-->