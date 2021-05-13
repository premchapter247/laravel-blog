@extends('layouts.default')
@section('page_body_content')
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

        <div class="col-lg-8 entries">
		@if($blogData != null)
			@foreach ($blogData as $item)
            <article class="entry">

              <div class="entry-img">
                <img src="{{asset($item->main_image)}}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{url('/blog-details')}}/{{$item->id}}">{{$item->title}}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!!$item->description!!}
                <div class="read-more">
                  <a href="{{url('blog-details')}}/{{$item->id}}">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
			@endforeach
            {{-- {{ $blogData->links() }} --}}
			@endif 
            <div class="blog-pagination">
              <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul>
            </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
					@foreach ($category as $cat)
						<li><a href="#">{{$cat->category}} <span>({{$cat->posts_count}})</span></a></li>
					@endforeach
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
				@foreach($latestPost as $post)
					<div class="post-item clearfix">
						<img src="{{asset($post->main_image)}}" alt="">
						<h4><a href="blog-single.html">{{$post->title}}</a></h4>
						<time datetime="{{date('M d Y', strtotime($post->created_at))}}">{{date('M d Y', strtotime($post->created_at))}}</time>
					</div>
				@endforeach

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  @foreach(all_tags() as $key => $value )
                              <li><a href="#">{{$value}}</a></li>
                  @endforeach
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main>
  <!-- End #main -->
@stop