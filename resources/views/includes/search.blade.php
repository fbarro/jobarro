<div class="jumbotron jumbotron-muted">
  <div class="container">
      <div class="col-lg-6">
        @if(Auth::guard('company')->check())
        <form action="{{route('job.seeker.list')}}" method="get"> 
            <div class="searchform search-desc">
                <h2 class="text-desc">{{__('One million success stories. Start yours today.')}}</span></h2>
                <p class="lead"><span>{{__('78,615 jobs in the Philippines and Overseas')}}.</span></p>
                <div class="input-group">
                <input type="text"  name="search" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Search for Skills or Job Seeker Details')}}" />
                @if((bool)$siteSetting->country_specific_site)

                {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}

                @endif
                <span class="input-group-btn">
                    <input type="submit" class="btn" value="{{__('Search')}}">           
                </span>
                </div>
                <br>   
            </div>   
        </form>
        @else
        <form action="{{route('job.list')}}" method="get">
            <div class="searchform search-desc">
                <h2 class="text-desc">{{__('One million success stories. Start yours today.')}}</span></h2>
                <p class="lead"><span>{{__('78,615 jobs in the Philippines and Overseas')}}.</span></p>
                <div class="input-group">
                    <input type="text"  name="search" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Search for skills or job title or Location')}}" />
                    @if((bool)$siteSetting->country_specific_site)

                    {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}

                    @endif
                <span class="input-group-btn">
                    <input type="submit" class="btn" value="{{__('Search')}}">           
                </span>
                </div>
                <br>   
            </div>  
         </form>
        @endif
      </div>
      <div class="col-lg-6">
            <img class="img-responsive img-display" src="https://affinityjava.com/wp-content/uploads/2018/12/achievement3.png"/>
      </div>   
  </div>
</div>