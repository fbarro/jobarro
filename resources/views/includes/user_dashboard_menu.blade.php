<div class="col-md-3 col-sm-4">

	<div class="profile-sidebar">
		<!-- SIDEBAR USERPIC -->
		<div class="profile-userpic">			
			<a href="{{ route('my.profile') }}"title="{{Auth::user()->getName()}}"> <img src="{{Auth::user()->getUserImage()}}" class="img-responsive" alt="{{Auth::user()->getName()}}"></a>
		</div>
		<!-- END SIDEBAR USERPIC -->
		<!-- SIDEBAR USER TITLE -->
		<div class="profile-usertitle">
			<div class="profile-usertitle-name">
					{{Auth::user()->getName()}}
			</div>
		</div>
		<!-- END SIDEBAR USER TITLE -->
		<!-- SIDEBAR BUTTONS -->
		<div class="profile-userbuttons">
				<a href="{{ route('my.profile') }}"  class="btn btn-success btn-sm"> {{__('View My Profile')}}</a>
		</div>
		<!-- END SIDEBAR BUTTONS -->
		<div class="switchbox">

			<div class="txtlbl">{{__('Immediate Available')}}
			</div>
	
			<div class="pull-right">
	
				<label class="switch switch-green"> @php
	
			$checked = ((bool)Auth::user()->is_immediate_available)? 'checked="checked"':'';
	
			@endphp
	
			<input type="checkbox" name="is_immediate_available" id="is_immediate_available" class="switch-input" {{$checked}} onchange="changeImmediateAvailableStatus({{Auth::user()->id}}, {{Auth::user()->is_immediate_available}});">
	
			<span class="switch-label" data-on="On" data-off="Off"></span> <span class="switch-handle"></span> </label>
	
			</div>
	
			<div class="clearfix"></div>
	
		</div>
		<!-- SIDEBAR MENU -->
		<div class="profile-usermenu">
			<ul class="nav">

					<li class="{{ Request::url() == route('home') ? 'active' : '' }}"><a href="{{route('home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a>
					</li>
			
					<li class="{{ Request::url() == route('my.job.applications') ? 'active' : '' }}"><a href="{{ route('my.job.applications') }}"><i class="fa fa-briefcase" aria-hidden="true"></i> {{__('My Job Applications')}}</a>
					</li>
			
					<li class="{{ Request::url() == route('my.favourite.jobs') ? 'active' : '' }}"><a href="{{ route('my.favourite.jobs') }}"><i class="fa fa-heart" aria-hidden="true"></i> {{__('My Favourite Jobs')}}</a>
					</li>
			
					<li class="{{ Request::url() == route('my.profile') ? 'active' : '' }}"><a href="{{url('my-profile#cvs')}}"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Manage Resume')}}</a>
					</li>
			
					<li class="{{ Request::url() == route('my.messages') ? 'active' : '' }}"><a href="{{route('my.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('My Messages')}}</a>
					</li>
			
					<li class="{{ Request::url() == route('my.followings') ? 'active' : '' }}"><a href="{{route('my.followings')}}"><i class="fa fa-user-o" aria-hidden="true"></i> {{__('My Followings')}}</a>
					</li>
			
				</ul>


		</div>
		<!-- END MENU -->
	</div>
	
	<div class="row">

		<div class="col-md-12">{!! $siteSetting->dashboard_page_ad !!}</div>

	</div>

</div>