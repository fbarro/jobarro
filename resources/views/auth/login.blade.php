@extends('layouts.app')

@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 

<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Login')])
<!-- Inner Page Title end -->
<div class="signInWraper">
  <div class="container">
  @include('flash::message')

  <div class="login-overlay">
      <div class="login-content">
          <div class="login-header">
              <h3>Existing Member? Sign In</h3>   
          </div>
          <!--login body-->
          <div class="login-body">

            <div class="row">
              <div class="col-md-7">
                <div class="userccount">
                  <div class="tab-content">
                    <div id="candidate" class="formpanel tab-pane fade active in">
                    <!--<div class="socialLogin">
                                <h5>{{__('Login Or Register with Social')}}</h5>
                                <a href="{{ url('login/jobseeker/facebook')}}" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="{{ url('login/jobseeker/google')}}" class="gp"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a href="{{ url('login/jobseeker/twitter')}}" class="tw"><i class="fa fa-twitter" aria-hidden="true"></i></a> </div>-->
                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="candidate" />
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
                    <div class="formrow">        
                      <input type="submit" class="btn" value="{{__('Login')}}">
                    </div>    
                  </div>
                  <!-- login form  end--> 
                  </form>
                    </div>
                  </div>
                  <div class="clearfix">
                      <div class="row row-mid">
                          <div class="col-md-6 col-sm-6"><label class="pull-left checkbox-inline"><input type="checkbox" class="remember-me"> Remember me</label></div>
                          <div class="col-md-6 col-sm-6"> <a href="{{ route('password.request') }}" class="pull-right search_input">{{__('Forgot 
                          Password')}}?</a></div>                    
                      </div>
                  </div>
                  <div class="or-seperator"><i>or</i></div>
                  <p class="text-center">Login with your social media account</p>
                  <div class="text-center social-btn">
                      <a href="{{ url('login/jobseeker/facebook')}}" class="btn btn-primary fb-btn"><i class="fa fa-facebook"></i>&nbsp; Facebook</a>                      
                  </div>
                  <!-- login form -->
                  
                </div>
              </div>
              <div class="col-md-5">
                  <div class="signup_lead">
                      <h4>Not a member yet? Sign Up for FREE</span></h4>
                      <ul class="list-unstyled">
                          <li><span class="fa fa-check text-success"></span> <p>To get noticed, keep your resume and profile updated, always</p></li>
                          <li><span class="fa fa-check text-success"></span> <p>Find jobs matching your salary</p></li>
                          <li><span class="fa fa-check text-success"></span> <p>Save your favorites</p></li>
                          <li><span class="fa fa-check text-success"></span> <p>Verify your contact details and let recruiters reach you</p></li>
                          <li><span class="fa fa-check text-success"></span> <p>Create customized alerts for the type of jobs you want to apply for</p></li>                        
                      </ul>            
                      <p class="lead">
                      <a href="{{route('register')}}" class="btn btn-primary btn-block jz_button but_orange">Sign Up NOW for Free!</a>
                      </p>
                  </div>
              </div>
            </div>

      </div>
      <!--login body-->
    </div>

  </div>

  </div>
</div>
@include('includes.footer')
@endsection
