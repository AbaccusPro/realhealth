@extends('layouts.app')
@section('title')
    Login
@stop

@section('head')
<style>
  #mybtn{
    color: #ffffff;
    background-color: #1863b0;
    border-color: #1863b0;
  }
  
  .login-wrapper{
    background-color: #132f78;
  }
</style>
@stop
@section('body')
<input type="hidden" name="_token" value="{{ csrf_token() }}">
     <div class="login-wrapper ">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="{{asset('styles/assets/img/demo/wall.jpg')}}" data-src="{{asset('styles/assets/img/demo/wall.jpg')}}" data-src-retina="{{asset('styles/assets/img/demo/wall.jpg')}}" alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
          <h2 class="semi-bold text-white">
                    Real Health</h2>
          <p class="small">
            RealHealth® Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione odio, ducimus tempore iusto nesciunt.
          </p>
        </div>
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->
      <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          {{--<img src="{{asset('styles/assets/img/logo_login.png')}}" alt="logo" data-src="{{asset('styles/assets/img/logo_login.png')}}" data-src-retina="{{asset('styles/assets/img/logo_login.png')}}" width="25%">--}}
          <p class="p-t-35">Sign into your Account</p>
          <!-- START Login Form -->
          <form id="form-login" class="p-t-15" role="form" action="{{ url('login') }}" method="POST">
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Login</label>
              <div class="controls">
                <input type="text" name="username" placeholder="User Name" class="form-control" required>
              </div>
            </div>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Password</label>
              <div class="controls">
                <input type="password" class="form-control" name="password" placeholder="Credentials" required>
              </div>
            </div>
            <!-- START Form Control-->
            <div class="row">
              <div class="col-md-6 no-padding">
                <div class="checkbox ">
                  <input type="checkbox" value="1" id="checkbox1">
                  <label for="checkbox1">Keep Me Signed in</label>
                </div>
              </div>
              <div class="col-md-6 text-right">
                <a href="#" class="text-info small">Help? Contact Support</a>
              </div>
            </div>
            <!-- END Form Control-->
            <button class="btn btn-primary btn-cons m-t-10" type="submit" id="mybtn">Sign in</button>
          </form>
          <!--END Login Form-->
        </div>
      </div>
      <!-- END Login Right Container-->
    </div>


@stop
