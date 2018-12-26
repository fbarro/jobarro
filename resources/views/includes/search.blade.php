<div class="jumbotron jumbotron-primary">
  <div class="container">
      <div class="col-lg-6">
        <div class="searchform search-desc">
            <h2 class="text-desc">{{__('One million success stories')}}.</span></h2>
            <h2 class="text-desc"><span>{{__('Start yours today')}}.</span></h2>
            <p class="lead">Downloaded more than 30,000 times, this 100-page guide to SketchUp is a must-read for serious 3D designers!</p>
            <div class="input-group">
             <input type="text"  name="search" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Search for skills or job title or Location')}}" />
            <span class="input-group-btn">
                <input type="submit" class="btn" value="{{__('Search')}}">           
            </span>
            </div>
            <br>   
        </div>     
      </div>
      <div class="col-lg-6">
            <img class="img-responsive" src="https://i.imgur.com/1Vm0su2.png"/>
      </div>   
  </div>
</div>