
@extends('frontend.layouts.apps')
@section('content')
  
        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area">
          <h1>Home</h1>
          <ol class="breadcrumb">
            <li class="item">
              <!--<a href="{{route('dashboard')}}"><i class="bx bx-home-alt"></i></a>-->
              <i class="bx bx-home-alt"></i>
            </li>
  
            <li class="item">Customer Dashboard</li>
  
          </ol>
        </div>
          <div>

          {{--<h2>Welcome <strong>{{Session::get('user')['first_name']}}</strong></h2>--}}
         <h2>Welcome <strong>{{Session::get('customer')['name']}}</strong></h2>

          </div>
  
@endsection