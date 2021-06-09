<div>
	@push('custom-css')
	<link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
	@endpush
	{{-- <div class="container-fluid">
		<div class="row mt-5">
			<div class="col-md-12 p-0">
				<div class="video-container" wire:ignore>

					<video id="yt-video" controls preload="auto"
						class="video-js vjs-fill vjs-styles=default vjs-big-play-centered" data-setup="{}"
						poster="{{ asset('videos/'. $video->uid . '/' . $video->thumbnail_image)}}">
						<source src="{{ asset('videos/'. $video->uid . '/' . $video->proccessed_file)}}"
							type="application/x-mpegURL">
						<p class="vjs-no-js">
							To view this video please enable JavaScript, and consider upgrading to a
							web browser that
							<a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
								video</a>
						</p>
					</video>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="d-flex justify-content-between align-items-center">
							<div class="">
								<h3 class="mt-4">{{ $video->title }}</h3>
								<p class="gray-text">{{ $video->views }} views . {{ $video->uploaded_date }} </p>
							</div>
							<div class="">
								<livewire:video.voting :video="$video" />
							</div>
						</div>

					</div>
				</div>

				<hr>
				<div class="row">
					<div class="col-md-12">
						<livewire:channel.channel-info :channel="$video->channel" />
					</div>
				</div>

				<hr>

				<h4>{{ $video->AllcommntsCount()}} Comments</h4>
				@auth
				<div class="my-2">
					<livewire:comment.new-comment :video="$video" :key="$video->id" />
				</div>

				@endauth


				<livewire:comment.all-comments :video="$video" />
			</div>
			<div class="col-md-4">

			</div>
		</div>
	</div> --}}


	<!-- Start post-content Area -->
	<section class="post-content-area single-post-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 posts-list">
					<div class="single-post row">
						<div class="col-lg-12">
							<div class="feature-img">
								<div class="video-container" wire:ignore>
									<video id="yt-video" controls preload="auto"
										class="video-js vjs-fill vjs-styles=default vjs-big-play-centered"
										data-setup="{}"
										poster="{{ asset('videos/'. $video->uid . '/' . $video->thumbnail_image)}}">
										<source src="{{ asset('videos/'. $video->uid . '/' . $video->proccessed_file)}}"
											type="application/x-mpegURL">
										<p class="vjs-no-js">
											To view this video please enable JavaScript, and consider upgrading to a
											web browser that
											<a href="https://videojs.com/html5-video-support/" target="_blank">supports
												HTML5
												video</a>
										</p>
									</video>
								</div>
							</div>
						</div>

					</div>

					<div class="row pt-0">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="d-flex justify-content-between align-items-center">
										<div class="">
											<h3 class="mt-0">{{ $video->title }}</h3>
											<p class="gray-text">{{ number_format($video->views, 0, ',', ',') }} views .
												{{ $video->uploaded_date }} </p>
										</div>
										<div class="">
											<livewire:video.voting :video="$video" />
										</div>
									</div>

								</div>
							</div>

							<hr>
							<div class="row">
								<div class="col-md-12">
									<livewire:channel.channel-info :channel="$video->channel" />
								</div>
							</div>

							<hr>

							<h4>{{ $video->AllcommntsCount()}} Comments</h4>
							@auth
							<div class="my-2">
								<livewire:comment.new-comment :video="$video" :key="$video->id" />
							</div>

							@endauth


							<livewire:comment.all-comments :video="$video" />
						</div>



					</div>
					<!-- <div class="col-lg-4 sidebar-widgets">
					<div class="widget-wrap">
						<div class="single-sidebar-widget search-widget">
							<form class="search-form" action="#">
								<input placeholder="Search Posts" name="search" type="text"
									onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
						<div class="single-sidebar-widget user-info-widget">
							<img src="img/blog/user-info.png" alt="">
							<a href="#">
								<h4>Charlie Barber</h4>
							</a>
							<p>
								Senior blog writer
							</p>
							<ul class="social-links">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-github"></i></a></li>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
							</ul>
							<p>
								Boot camps have its supporters andit sdetractors. Some people do not understand why you
								should have to spend money on boot camp when you can get. Boot camps have itssuppor ters
								andits detractors.
							</p>
						</div>
						<div class="single-sidebar-widget popular-post-widget">
							<h4 class="popular-title">Popular Posts</h4>
							<div class="popular-post-list">
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp1.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>Space The Final Frontier</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp2.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>The Amazing Hubble</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp3.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>Astronomy Or Astrology</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="img/blog/pp4.jpg" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>Asteroids telescope</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
							</div>
						</div>
						<div class="single-sidebar-widget ads-widget">
							<a href="#"><img class="img-fluid" src="img/blog/ads-banner.jpg" alt=""></a>
						</div>
						<div class="single-sidebar-widget post-category-widget">
							<h4 class="category-title">Post Catgories</h4>
							<ul class="cat-list">
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Technology</p>
										<p>37</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Lifestyle</p>
										<p>24</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Fashion</p>
										<p>59</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Art</p>
										<p>29</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Food</p>
										<p>15</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Architecture</p>
										<p>09</p>
									</a>
								</li>
								<li>
									<a href="#" class="d-flex justify-content-between">
										<p>Adventure</p>
										<p>44</p>
									</a>
								</li>
							</ul>
						</div>
						<div class="single-sidebar-widget newsletter-widget">
							<h4 class="newsletter-title">Newsletter</h4>
							<p>
								Here, I focus on a range of items and features that we use in life without
								giving them a second thought.
							</p>
							<div class="form-group d-flex flex-row">
								<div class="col-autos">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text"><i class="fa fa-envelope"
													aria-hidden="true"></i>
											</div>
										</div>
										<input type="text" class="form-control" id="inlineFormInputGroup"
											placeholder="Enter email" onfocus="this.placeholder = ''"
											onblur="this.placeholder = 'Enter email'">
									</div>
								</div>
								<a href="#" class="bbtns">Subcribe</a>
							</div>
							<p class="text-bottom">
								You can unsubscribe at any time
							</p>
						</div>
						<div class="single-sidebar-widget tag-cloud-widget">
							<h4 class="tagcloud-title">Tag Clouds</h4>
							<ul>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Architecture</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Technology</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Art</a></li>
								<li><a href="#">Adventure</a></li>
								<li><a href="#">Food</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Adventure</a></li>
							</ul>
						</div>
					</div>
				</div> -->
				</div>



				<div class="col-4">
					Riswan Ardinata
				</div>
			</div>
	</section>
	<!-- End post-content Area -->

	@push('scripts')
	<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>

	<script>
		var player = videojs('yt-video')
		var countedAsView = false;
		player.on('timeupdate', function () {
			if (!countedAsView && this.currentTime() > 3) {
				countedAsView = true;
				// this.off('timeupdate') // No longer neccessary
				Livewire.emit('VideoViewed')
			}
		})

	</script>

	@endpush
</div>