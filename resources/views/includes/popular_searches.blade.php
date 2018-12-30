<div class="section">
	<div class="container">

		<div class="topsearchwrap">
				
				<div class="srchbx">
				<!--Categories start-->
				<h4>{{__('Browse By Categories')}}</h4>
				<div class="srchint">
				<ul class="row catelist">					
					@if(isset($topIndustryIds) && count($topIndustryIds)) @foreach($topIndustryIds as $industry_id => $num_jobs)

					<?php

					$industry = App\ Industry::where( 'industry_id', '=', $industry_id )->lang()->active()->first();

					?> @if(null !== $industry)

					<li class="col-md-4 col-sm-6"><a href="{{route('job.list', ['industry_id[]'=>$industry->industry_id])}}" title="{{$industry->industry}}">{{$industry->industry}} <span>({{$num_jobs}})</span></a>
					</li>


					@endif @endforeach @endif

				</ul>
				<!--Categories end-->
				</div>
				</div>
				
				<div class="srchbx">
				<!--Cities start-->
				<h4>{{__('Browse By Locations')}}</h4>
				<div class="srchint">
				<ul class="row catelist">

					@if(isset($topCityIds) && count($topCityIds)) @foreach($topCityIds as $city_id_num_jobs)

					<?php

					$city = App\ City::getCityById( $city_id_num_jobs->city_id );
					
					?> @if(null !== $city)
					
					<li class="col-md-3 col-sm-4 col-xs-6"><a href="{{route('job.list', ['city_id[]'=>$city->city_id])}}" title="{{$city->city}}">{{$city->city}} <span>({{$city_id_num_jobs->num_jobs}})</span></a>
					</li>
					
					@endif @endforeach @endif
				</ul>
				<!--Cities end-->
				</div>
				</div>

	</div>
</div>
</div>