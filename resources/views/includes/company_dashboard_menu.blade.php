<div class="col-md-3 col-sm-4">
        <ul class="usernavdash">
          <li class="{{ Request::url() == route('company.home') ? 'active' : '' }}"><a href="{{route('company.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a></li>
          <li class="{{ Request::url() == route('company.profile') ? 'active' : '' }}"><a href="{{ route('company.profile') }}"><i class="fa fa-cog" aria-hidden="true"></i> {{__('Company Settings')}}</a></li>
          <li><a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('Company Public Profile')}}</a></li>
          <li class="{{ Request::url() == route('post.job') ? 'active' : '' }}"><a href="{{ route('post.job') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Job')}}</a></li>
          <li class="{{ Request::url() == route('posted.jobs') ? 'active' : '' }}"><a href="{{ route('posted.jobs') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> {{__('Company Jobs')}}</a></li>          
          <li class="{{ Request::url() == route('company.messages') ? 'active' : '' }}"><a href="{{route('company.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('Company Messages')}}</a></li>
          <li class="{{ Request::url() == route('company.followers') ? 'active' : '' }}"><a href="{{route('company.followers')}}"><i class="fa fa-user-o" aria-hidden="true"></i> {{__('Company Followers')}}</a></li>         
        </ul>
        <div class="row">
      <div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>
      </div>
      </div>