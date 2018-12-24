@extends('layouts.app')



@section('content') 

<!-- Header start --> 

@include('includes.header') 

<!-- Header end --> 



<!-- Inner Page Title start --> 

@include('includes.inner_page_title', ['page_title'=>__('Job Listing')]) 

<!-- Inner Page Title end -->



<div class="searchpgWraper">

  <div class="container">

  @include('flash::message')

    <form action="{{route('job.list')}}" id="searchForm" method="get">

      <!-- Page Title start -->

      <div class="pageSearch">
         

        <div class="row searchRow">
<!--
          <div class="col-md-3">

          @if(Auth::guard('company')->check())

          <a href="{{ route('post.job') }}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Post Job')}}</a>

          @else

          <a href="{{url('my-profile#cvs')}}" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Upload Your Resume')}}</a>

          @endif


              <input type="text" name="search" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Skills or job title')}}" />
          </div>
-->
          <div class="col-md-12">

            <div class="searchform">

              <div class="row">

                <div class="col-md-{{((bool)$siteSetting->country_specific_site)? 4:3}}">                
                
                  <input type="text" name="search" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Job title, Keywords or Company')}}" />
                
                </div>
               
                <div class="col-md-3">
                  {!! Form::select('functional_area_id[]', ['' => __('All Categories')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!}

                </div>

                @if((bool)$siteSetting->country_specific_site)

                {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}

                @else

                <div class="col-md-3">

                {!! Form::select('country_id[]', ['' => __('Select Country')]+$countries, Request::get('country_id', $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}

                </div>

                @endif
                

                <div class="col-md-3">

                <span class="location_dd" id="state_dd">

                {!! Form::select('state_id[]', ['' => __('All Locations')], Request::get('state_id', null), array('class'=>'form-control', 'id'=>'state_id')) !!}

                </span>

                </div>
                {!! Form::hidden('orderZap', 'title', array('id'=>'orderZap')) !!}

                <div class="col-md-2">
                    <button type="submit" class="btn w100"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                </div>
             

              </div>

            </div>

          </div>

        </div>        

      </div>
     

      <!-- Page Title end -->

    </form>

    <form action="{{route('job.list')}}" method="get">

      <!-- Search Result and sidebar start -->

      <div class="row"> @include('includes.job_list_side_bar')

        <div class="col-md-2 col-sm-6 pull-right">

          <!-- Sponsord By -->

          <div class="sidebar">

            <h4 class="widget-title">{{__('Sponsord By')}}</h4>

            <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>

          </div>

        </div>

        <div class="col-md-7 col-sm-12"> 
            <div class="row searchRow sortingBy">
                <div class="col-md-7">
                    <div class="params">                    
                       {{((bool)Request::get('search', ''))? 'Search for: '.Request::get('search', ''):'All'}} jobs 
                    </div>
                </div>
                <div class="col-md-5">
                  <div class="sorting pull-right">
                    <div class="sortMen"><span><i class="fa fa-sort-alpha-asc"></i></span></div>
                    <div class="sortMen">
                        {!! Form::select('sortBy[]', ['date' => __('Date Posted')]+$defaultSortingItems, Request::get('orderZap', 'date'), array('class'=>'form-control selSort', 'id'=>'sortBy')) !!}
                     </div>  
                   </div>
                </div>
            </div>

          <!-- Search List -->

          <ul class="searchList">

            <!-- job start --> 

            @if(isset($jobs) && count($jobs))

            @foreach($jobs as $job)

            @php $company = $job->getCompany(); @endphp

            @if(null !== $company)

            <li @if($job->is_featured == 1) class="featured" @endif >

              <div class="row">

                <div class="col-md-8 col-sm-8">

                  <div class="jobimg">{{$company->printCompanyImage()}}</div>

                  <div class="jobinfo">

                    <h3><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>

                    <div class="companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>

                    <div class="location">
				          	  <label class="fulltime" title="{{$job->getJobType('job_type')}}">{{$job->getJobType('job_type')}}</label>
                      - <span>{{$job->getCity('city')}}</span>
                    </div>

                  </div>

                  <div class="clearfix"></div>

                </div>

                <div class="col-md-4 col-sm-4">

                  <div class="listbtn"><a href="{{route('job.detail', [$job->slug])}}">{{__('View Details')}}</a></div>

                </div>

              </div>

              <p>{{str_limit(strip_tags($job->description), 170, '...')}}</p>
              
              <div >
                <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i> &nbsp;{{ \Carbon\Carbon::parse($job->created_at)->format('d M Y H:i A')}}</div>
              </div>
            </li>

            <!-- job end --> 

            @endif

            @endforeach

            @else

            <div class="searchlist">
                <div class="alert alert-danger" align="center">
                  <p><strong> Sorry, we did not find any job matching your criteria. </strong></p>
                </div>
                <div>
                    <h4 class="search-suggest">Job Search Suggestions:</h4>
                    <p>-Try more general keywords. </p>
                    <p>-Make sure all keywords (jobtitle, company name, skills) are spelled correctly. </p>
                    <p>-Use entire words instead of abbreviations. </p>
                </div>          
            </div>

            @endif

          </ul>

          

          <!-- Pagination Start -->

          <div class="pagiWrap">

            <div class="row">

              <div class="col-md-5">

                <div class="showreslt">

                {{__('Showing Pages')}} : {{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} {{__('Total')}} {{ $jobs->total() }} {{__('Jobs')}}

                </div>

              </div>

              <div class="col-md-7 text-right">

              @if(isset($jobs) && count($jobs))

                {{ $jobs->appends(request()->query())->links() }}

              @endif

              </div>

            </div>

          </div>

          <!-- Pagination end --> 

          <div class="addInListing"><br />{!! $siteSetting->listing_page_horizontal_ad !!}</div>

                

        </div>

      </div>

    </form>

  </div>

</div>

@include('includes.footer')

@endsection

@push('styles')

<style type="text/css">

.searchList li .jobimg {

    min-height: 80px;

}

.hide_vm_ul{

	height:100px;

	overflow:hidden;

}

.hide_vm{

	display:none !important;

}

.view_more{

	cursor:pointer;

}

</style>

@endpush

@push('scripts') 

<script>

    $(document).ready(function ($) {

        $("form").submit(function () {

            $(this).find(":input").filter(function () {

                return !this.value;

            }).attr("disabled", "disabled");

            return true;

        });

        $("form").find(":input").prop("disabled", false);

				

		$( ".view_more_ul" ).each(function() {

		  	if($( this ).height() > 100)

			{

				$( this ).addClass('hide_vm_ul');

				$( this ).next().removeClass('hide_vm');

			}

		});



		$('.view_more').on('click', function(e){

			e.preventDefault();

			$( this ).prev().removeClass('hide_vm_ul');

			$( this ).addClass('hide_vm');

		});

    $("#sortBy").change(function(){
        $("#orderZap").val($(this).val());
        $('#searchForm').trigger('submit');
    });

	});

</script>

@include('includes.country_state_city_js')

@endpush