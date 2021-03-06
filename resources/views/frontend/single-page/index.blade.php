@extends('frontend.layouts.master')

@section('content')



<div class="main-slider">
  <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
    data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
    data-swiper-breakpoints="true" data-swiper-loop="true" >
    <div class="swiper-wrapper">

      @foreach($categories as $category)
      <div class="swiper-slide">
        <a class="slider-category" href="#">
          <div class="blog-image"><img src="{{asset('public/upload/category_images/'.$category->image)}}" alt="Blog Image"></div>

          <div class="category">
            <div class="display-table center-text">
              <div class="display-table-cell">
                <h3><b>{{$category->name}}</b></h3>
              </div>
            </div>
          </div>

        </a>
      </div><!-- swiper-slide -->

        @endforeach
</div><!-- slider -->

<section class="blog-area section">
  <div class="container">

    <div class="row">
        @foreach($allposts as $post)
      <div class="col-lg-4 col-md-6">
        <div class="card h-100">
          <div class="single-post post-style-1">

            <div class="blog-image"><img src="{{asset('public/upload/posts_image/'.$post->image)}}" alt="Blog Image"></div>

             <a class="avatar" href="#"><img src="{{asset('public/upload/user_images/'.$post['user']['image'])}}" alt="Profile Image"></a>

            <div class="blog-info">

              <h4 class="title"><a href="{{route('post.details',$post->id)}}"><b>{{$post->title}}</b></a></h4>

              <ul class="post-footer">
                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                <li><a href="#"><i class="ion-eye"></i>138</a></li>
              </ul>

            </div><!-- blog-info -->
          </div><!-- single-post -->
        </div><!-- card -->
      </div><!-- col-lg-4 col-md-6 -->

      @endforeach

    </div><!-- row -->

    <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

  </div><!-- container -->
</section><!-- section -->

  @endsection
