<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-12"> <a href="{{url('/')}}" class="logo"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" alt="{{ $siteSetting->site_name }}" /></a>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="col-md-10 col-sm-9 col-xs-12"> 
        
        <!-- Nav start -->
        
        <div class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="navbar-collapse collapse" id="nav-main">
            <ul class="nav navbar-nav">
              <li class="{{ Request::url() == route('index') ? 'active' : '' }}"><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i></a> </li>
              @foreach($show_in_top_menu as $top_menu) @php $cmsContent = App\CmsContent::getContentBySlug($top_menu->page_slug); @endphp
              <li class="{{ Request::url() == route('cms', $top_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $top_menu->page_slug) }}">{{ $cmsContent->page_title }}</a> </li>
              @endforeach
              @if(!Auth::guard('company')->user())
              <li class="{{ Request::url() == route('job.list') ? 'active' : '' }}"><a href="{{ route('job.list') }}">{{__('Job Search')}}</a> </li>
              @endif 
              @if(Auth::check())
              <li class="dropdown"><a href="{{route('employer.login')}}">{{__('My Dashboard')}} <span class="caret"></span></a>             
                <ul class="dropdown-menu">
                  <li><a href="{{route('home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a></li>
                  <li><a href="{{ route('my.job.applications') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> {{__('My Job Applications')}}</a></li>
                  <li><a href="{{ route('my.favourite.jobs') }}"><i class="fa fa-heart" aria-hidden="true"></i> {{__('My Favourite Jobs')}}</a></li>
                  <li><a href="{{url('my-profile#cvs')}}"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Manage Resume')}}</a></li>
                  <li><a href="{{route('my.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('My Messages')}}</a></li>
                  <li><a href="{{route('my.followings')}}"><i class="fa fa-user-o" aria-hidden="true"></i> {{__('My Followings')}}</a></li>
                </ul>                
              </li>
              <li class="{{ Request::url() == route('my.messages') ? 'active' : '' }}"><a href="{{ route('my.messages') }}"><i class="fa fa-envelope-o" aria-hidden="true"></i></a> </li>              
              <li class="dropdown userbtn">
                <a class="navbar-brand name-img pull-left" href="#">{{Auth::user()->printUserImage()}}</a><span class="name-text pull-left">{{Auth::user()->getDisplayName()}} <i class="fa fa-caret-down"></i></span>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('my.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('My Profile')}}</a> </li>
                  <li><a href="{{ route('view.public.profile', Auth::user()->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('View Public Profile')}}</a> </li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                  <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </ul>
              </li>
              @endif @if(Auth::guard('company')->check())              
              <li class="{{ Request::url() == route('job.seeker.list') ? 'active' : '' }}"><a href="{{ route('job.seeker.list') }}">{{__('Resume Search')}}</a> </li>              
              <li class="{{ Request::url() == route('posted.jobs') ? 'active' : '' }}"><a href="{{ route('posted.jobs') }}">{{__('Job Ads')}}</a> </li>
              <li class="dropdown"><a href="#">{{__('My Dashboard')}} <span class="caret"></span></a>             
                <ul class="dropdown-menu">
                  <li><a href="{{route('company.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>                 
                  <li><a href="{{ route('post.job') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Job')}}</a></li>
                  <li><a href="{{route('posted.jobs')}}"><i class="fa fa-briefcase" aria-hidden="true"></i> {{__('Company Job Ads')}}</a></li>
                  <li><a href="{{route('company.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('Company Messages')}}</a></li>
                  <li><a href="{{route('company.followers')}}"><i class="fa fa-users" aria-hidden="true"></i> {{__('Company Followers')}}</a></li>                  
                </ul>                
              </li>      
              <li class="dropdown userbtn">                
                <a class="navbar-brand name-img pull-left" href="#">{{Auth::guard('company')->user()->printCompanyImage()}}</a><span class="name-text pull-left">{{Auth::guard('company')->user()->getCompanyName()}} <i class="fa fa-caret-down"></i></span>
                <ul class="dropdown-menu">    
                  <li><a href="{{ route('company.profile') }}"><i class="fa fa-cog" aria-hidden="true"></i> {{__('Company Settings')}}</a></li>       
                  <li><a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('Company Public Profile')}}</a></li>                                    
                  <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                  <form id="logout-form-header1" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </ul>
              </li>
              @endif @if(!Auth::user() && !Auth::guard('company')->user())
              <li class="{{ Request::url() == route('login') ? 'active' : '' }}"><a href="{{url('login')}}">{{__('Sign in')}}</a> </li>
              <li class="{{ Request::url() == route('register') ? 'active' : '' }}"><a href="{{url('register')}}">{{__('Sign Up')}}</a> </li>
              <!--li class="dropdown"><a href="{{route('login')}}">{{__('Sign in')}} <span class="caret"></span></a> 
                
                <ul class="dropdown-menu">
                  <li><a href="{{route('login')}}">{{__('Sign in')}}</a> </li>
                  <li><a href="{{route('register')}}">{{__('Sign Up')}}</a> </li>
                  <li><a href="{{route('password.request')}}">{{__('Forgot Password')}}?</a> </li>
                </ul>
             
              </li-->
              <li class="emplinkli dropdown"><a href="{{route('employer.login')}}" class="emplink">{{__('Employers')}} <span class="caret"></span></a> 
            
                <ul class="dropdown-menu">
                  <li><a href="{{route('employer.login')}}">{{__('Sign in')}}</a> </li>
                  <li><a href="{{route('employer.register')}}">{{__('Sign Up')}}</a> </li>
                  <li><a href="{{route('password.request')}}">{{__('Forgot Password')}}?</a> </li>
                </ul>
                
              </li>
              @endif                       
            
            </ul>
            
            <!-- Nav collapes end --> 
            
          </div>
          <div class="clearfix"></div>
        </div>
        
        <!-- Nav end --> 
        
      </div>
    </div>
    
    <!-- row end --> 
    
  </div>
  
  <!-- Header container end --> 
  
</div>
