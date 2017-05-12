@extends('layouts.home')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div id="main-slider" class="owl-carousel owl-theme">
        <div class="item"><img src="{{ URL::asset('assets/images/slide1.jpg') }}" alt="The Last of us"></div>
        <div class="item"><img src="{{ URL::asset('assets/images/slide2.jpg') }}" alt="GTA V"></div>
        <div class="item"><img src="{{ URL::asset('assets/images/slide3.jpg') }}" alt="Mirror Edge"></div>
      </div>
    </div>
  </div><!--end-main-slider-->
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="feature-title">Top TV Series</div>
      <div id="feature-slider" class="owl-carousel owl-theme">
        <div class="item"><img src="{{ URL::asset('assets/images/future-1.jpg') }}" class="img-responsive" alt=""/></div>
        <div class="item"><img src="{{ URL::asset('assets/images/future-2.jpg') }}" class="img-responsive" alt=""/></div>
        <div class="item"><img src="{{ URL::asset('assets/images/future-3.jpg') }}" class="img-responsive" alt=""/></div>
        <div class="item"><img src="{{ URL::asset('assets/images/future-4.jpg') }}" class="img-responsive" alt=""/></div>
        <div class="item"><img src="{{ URL::asset('assets/images/future-5.jpg') }}" class="img-responsive" alt=""/></div>
        <div class="item"><img src="{{ URL::asset('assets/images/future-1.jpg') }}" class="img-responsive" alt=""/></div>
        <div class="item"><img src="{{ URL::asset('assets/images/future-2.jpg') }}" class="img-responsive" alt=""/></div>
        <div class="item"><img src="{{ URL::asset('assets/images/future-3.jpg') }}" class="img-responsive" alt=""/></div>
        <div class="item"><img src="{{ URL::asset('assets/images/future-4.jpg') }}" class="img-responsive" alt=""/></div>
        <div class="item"><img src="{{ URL::asset('assets/images/future-5.jpg') }}" class="img-responsive" alt=""/></div>
      </div>
    </div>
  </div><!--end-feature-slider-->
  <div class="row news-section">
	<div class="feature-title">Top Movies</div>
	@if(!empty($posts))
	@foreach($posts as $post)
	<div class="col-md-3 col-sm-3">
      <div class="box-1" style="min-height: 450px;">
        <h2><span>{{ $post->title }}</span></h2>
        <img src="{{ url('/postimages/'.$post->post_image) }}" class="img-responsive"  alt="" width="270" height="140" />
        @if(strlen($post->body) > 180)
        <p>{{ substr( $post->body,0, 180 ) }}...</p>
        @else
        <p>{{ $post->body }}</p>
        @endif
        <div class="more-btn"><a href="{{ url('/post/'.$post->id ) }}">More</a></div>
      </div>
    </div>
    @endforeach
	@endif

  </div><!--end-news-section-->
  <div class="row welcome-section">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <h1><span>Hello There!</span><br>
        Welcome to our Site</h1>
      <div class="row">
        <img src="{{ URL::asset('assets/images/welcome.jpg') }}" class="img-responsive pull-left welcome-img"  alt=""/>
          <h3 class="padding">What is Lorem Ipsum? Lorem Ipsum is simply</h3>
          <p class="padding">Lorem Ipsum is simply dummy text of the printing and typesetting industry. galley of type and scrambled make a type specimen book.</p>      </div>
      <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <div class="more-btn"><a href="#">More</a></div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h3>24/7 Client <br>
            <span>Support</span></h3>
          <p>Lorem Ipsum is simply dummy text of the printing. galley of type and scrambled it to make a type specimen book. </p>
          <div class="more-btn"><a href="#">More</a></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h3>100% Satisfaction <br>
            <span class="guarantee">Guarantee</span></h3>
          <p>Lorem Ipsum is simply dummy text of the printing. galley of type and scrambled it to make a type specimen book. </p>
          <div class="more-btn"><a href="#">More</a></div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h3>View <br>
            <span class="gallery">Our Gallery</span></h3>
          <p>Lorem Ipsum is simply dummy text of the printing. galley of type and scrambled it to make a type specimen book. </p>
          <div class="more-btn"><a href="#">More</a></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <h3>Top <br>
            <span class="services">Services</span></h3>
          <p>Lorem Ipsum is simply dummy text of the printing. galley of type and scrambled it to make a type specimen book. </p>
          <div class="more-btn"><a href="#">More</a></div>
        </div>
      </div>
    </div>
  </div><!--end-welcome-section-->
</div><!--end-container-->
@stop