@extends('layouts.app')

@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 

<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Login')])
<!-- Inner Page Title end -->
<div class="empWraper">
 
    <section class="login-block">
        <div class="container bg-container">
          <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">{{__('Employer Login')}}</h2>
                <div class="empUseraccount">
                    <div class="userbtns">                   
                    </div>
                    <div class="tab-content">
                      <div id="employer" class="formpanel tab-pane fade active in">
                           <form class="form-horizontal" method="POST" action="{{ route('company.login') }}">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="candidate_or_employer" value="employer" />
                    <div class="formpanel">
                      <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('Email Address')}}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                      <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                      <input id="password" type="password" class="form-control" name="password" value="" required placeholder="{{__('Password')}}">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                      </div>            
                      <input type="submit" class="btn" value="{{__('Login')}}">
                    </div>
                    <!-- login form  end--> 
                    </form>
                      </div>
                    </div>
                    <!-- login form -->
                    
                    <!-- sign up form -->
                    <div class="newuser"><a href="{{ route('password.request') }}">{{__('Forgot Your Password')}}?</a></div>
                    <div class="newuser"> {{__('New User')}}? <a href="{{route('register')}}" class="btn empRegister">{{__('Register Here')}}</a></div>
                    <!-- sign up form end--> 
                    
                  </div>
            </div>
            
            <div class="col-md-8 banner-sec">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                      <div class="banner-text">
                          <h2>This is Heaven</h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                      </div>	
                    </div>
                  </div>             
              </div>
            </div>
        </div>
      </div>
    </section>
</div>
@include('includes.footer')
@endsection
