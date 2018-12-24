@if($video)
<div class="videowraper section">

  <div class="container"> 

    <!-- title start -->

    <div class="titleTop">

      <h3>{{__('Watch Our')}} <span>{{__('Video')}}</span></h3>

    </div>

    <!-- title end -->

    

    <p>{{$video->video_text}}</p>

    <a href="{{$video->video_link}}" target="_blank"><i class="fa fa-play-circle-o" aria-hidden="true"></i></a> </div>

</div>
@endif