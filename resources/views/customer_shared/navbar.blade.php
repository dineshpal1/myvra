


<nav class="navbar top-navbar navbar-expand">
  <div class="collapse navbar-collapse" id="navbarSupportContent">
    <div class="responsive-burger-menu d-block d-lg-none">
      <span class="top-bar"></span>
      <span class="middle-bar"></span>
      <span class="bottom-bar"></span>
    </div>

    <form class="nav-search-form d-none ml-auto d-md-block">
      {{-- <label><i class="bx bx-search"></i></label>
              <input
                type="text"
                class="form-control"
                placeholder="Search here..."
              /> --}}
    </form>

    <ul class="navbar-nav right-nav align-items-center">
      <li class="nav-item dropdown profile-nav-item">
        <a href="#" class="nav-link dropdown-toggle" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @php
         // $objUser = Illuminate\Support\Facades\Session::get('user');
           $objUser = Illuminate\Support\Facades\Session::get('customer');
          @endphp
          <div class="menu-profile">
            <span class="name">Hi! {{$objUser['name']}}</span>
            <span class="dot">
              <span style="font-size: 25px;margin-left:10px">
                @php
                echo substr($objUser['name'], 0, 1)
                @endphp
            </span>
            </span>
          </div>
        </a>

        <div class="dropdown-menu">
          <div class="dropdown-header d-flex flex-column align-items-center">
            <div class="figure mb-3">
              <span class="dot">
              <span style="font-size: 25px;margin-left:10px">

                @php
                $var = substr($objUser['name'], 0, 1);
                echo Str::ucfirst($var)
                @endphp
              </span>
              </span>


              {{-- <img
                        src="{{asset('/img/user2.jpg')}}"
              class="rounded-circle"
              alt="image"
              /> --}}
            </div>

            <div class="info text-center">
              <span class="name">{{$objUser['name']}}
                {{--$objUser['last_name']--}}</span>
              {{--<p class="mb-3 email">{{$objUser['email']}}</p>--}}
            </div>
          </div>

          <div class="dropdown-body">
            <ul class="profile-nav p-0 pt-3">
              {{-- <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="bx bx-user"></i> <span>Profile</span>
                        </a>
                      </li>
  
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="bx bx-edit-alt"></i> <span>Edit Profile</span>
                        </a>
                      </li> --}}

              <li class="nav-item">
                <a href="{{route('change-password')}}" class="nav-link">
                  <i class="bx bx-edit-alt"></i> <span>Change Password</span>
                </a>
              </li>
            </ul>
          </div>

          <div class="dropdown-footer">
            <ul class="profile-nav">
              <li class="nav-item">
                <a href="{{route('userLogout')}}" class="nav-link">
                  <i class="bx bx-log-out"></i> <span>Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </li>
    </ul>
  </div>
</nav>
<style>
  .dot {
    height: 40px;
    width: 40px;
    background-color: rgb(218, 213, 213);
    border-radius: 50%;
    display: inline-block;
  }
</style>