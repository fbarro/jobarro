@if($video)
<div class="videowraper section">

  <div class="container"> 

    <!-- title start -->

    <div class="titleTop">

      <h3>{{__('Watch Our')}} <span>{{__('Video')}}</span></h3>

    </div>

    <!-- title end -->

    

    <p>{{$video->video_text}}</p>

    <div class="employersection">   
      <h3>Get Started Now for Free!</h3>
      <div class="getstarted">
        <a href="{{ route('post.job') }}" class="btn postjobbtn" title="For Employers - Post a job">{{__('Post a Job')}}</a>
        <a href="{{ route('my.profile') }}" class="btn" title="For Job Seekers - Upload Resume">{{__('Upload Resume')}}</a></div>        
      <div class="getstarted"></div>
      <div class="clear"></div>
    </div>

  </div>
</div>
@endif