@extends('admin.layouts.app')

@section('content')
  
        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area">
          <h1>Home</h1>
          <ol class="breadcrumb">
            <li class="item">
              <a href="{{route('dashboard')}}"><i class="bx bx-home-alt"></i></a>
            </li>
  
            <li class="item">Dashboard</li>
  
          </ol>
        </div>
          <div>
          <h2>Welcome <strong>{{Session::get('user')['first_name']}}</strong></h2>
          </div>
  
@endsection