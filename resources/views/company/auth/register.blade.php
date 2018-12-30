@extends('layouts.app')

@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 

<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Register')]) 
<!-- Inner Page Title end -->
<div class="listpgWraper">
  <div class="container">
  @include('flash::message')
    <div class="row">
      <div class="col-md-7 col-md-offset-3">
        <div class="userRegister">
          <div class="userbtns">
            <h3>Make the right hire with Jobsportal</h3>
            <small>Create your employer account now</small>
          </div>
          <div class="tab-content">
            <div id="employer" class="formpanel">
              <form class="form-horizontal" method="POST" action="{{ route('company.register') }}">
                {{ csrf_field() }}
                <input type="hidden" name="candidate_or_employer" value="employer" />
                <div class="formrow{{ $errors->has('name') ? ' has-error' : '' }}">
                  <input type="text" name="name" class="form-control" required="required" placeholder="{{__('Name')}}" value="{{old('name')}}">
                  @if ($errors->has('name')) <span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span> @endif </div>
                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input type="email" name="email" class="form-control" required="required" placeholder="{{__('Email')}}" value="{{old('email')}}">
                  @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif </div>
                <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                  <input type="password" name="password" class="form-control" required="required" placeholder="{{__('Password')}}" value="">
                  @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif </div>
                <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <input type="password" name="password_confirmation" class="form-control" required="required" placeholder="{{__('Password Confirmation')}}" value="">
                  @if ($errors->has('password_confirmation')) <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span> @endif </div>
                <div class="formrow{{ $errors->has('terms_of_use') ? ' has-error' : '' }}">
                  <input type="checkbox" value="1" name="terms_of_use" /> I have read and agree to Job Portal's <a href="{{url('cms/terms-of-use')}}">{{__('Terms & Conditions')}}</a>
                  and <a href="{{url('cms/private-privacies')}}">{{__('Private Privacies')}}</a>
                    
                  @if ($errors->has('terms_of_use')) <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif </div>
                <div class="formrow{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}"> {!! app('captcha')->display() !!}
                  @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif </div>
                <input type="submit" class="btn" value="{{__('Register')}}">
              </form>
            </div>
          </div>
          <!-- sign up form -->
          <div class="newuser">{{__('Aleady Registered')}}? <a href="{{route('employer.login')}}">{{__('Sign in')}}</a></div>
          <!-- sign up form end--> 
          
        </div>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection 