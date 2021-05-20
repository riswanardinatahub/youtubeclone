{{-- <div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if ($videos->count())
                @foreach ( $videos as $video)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ route('video.watch', $video) }}">
                                    <img src="{{ $video->thumbnail }}"
                                        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                        alt="">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <h5> {{ $video->title }} </h5>
                                <p class="text-truncate">{{ $video->description }} </p>
                            </div>
                            <div class="col-md-2">
                                {{ $video->visibility }}
                            </div>
                            <div class="col-md-2">
                                {{ $video->created_at->format('d/m/Y') }}
                            </div>
                            @if (auth()->user()->owns($video))
                            <div class="col-md-2">
                                <a href="{{ route('video.edit', ['channel'=> auth()->user()->channel, 'video' => $video->uid]) }}"
                                    class="btn btn-info btn-sm"> Edit</a>
                                <a wire:click.prevent="delete('{{ $video->uid }}')" class="btn btn-danger btn-sm">
                                    Delete</a>
                            </div>

                            @endif
                        </div>
                    </div>
                </div>

                @endforeach
                @else
                <h1> No Videos </h1>

                @endif



            </div>
            {{ $videos->links() }}
        </div>


    </div>
</div> --}}

            <div class="col-lg-12 sidebar-widgets mt-5">
					<div class="widget-wrap">
						<div class="single-sidebar-widget popular-post-widget">
							<h4 class="popular-title">Your Videos</h4>
            <div class="col-md-12">

                @if ($videos->count())
                @foreach ( $videos as $video)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-2">
                                <a href="{{ route('video.watch', $video) }}">
                                    <img src="{{ $video->thumbnail }}"
                                        class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                            <div class="col-md-2">
                                <h5> {{ $video->title }} </h5>
                                <p class="text-truncate">{{ $video->description }} </p>
                            </div>
                            <div class="col-md-2">
                                {{ $video->visibility }}
                            </div>
                            <div class="col-md-2">
                                {{ $video->created_at->format('d/m/Y') }}
                            </div>
                            @if (auth()->user()->owns($video))
                            <div class="col-md-2 p-0">
                                <a href="{{ route('video.edit', ['channel'=> auth()->user()->channel, 'video' => $video->uid]) }}"
                                    class="genric-btn info"> Edit</a>
                                    {{-- <a wire:click.prevent="delete('{{ $video->id }}')" class="genric-btn danger" style="color:white;">
                                    Delete</a> --}}

                                    <button type="button" wire:click="deleteId({{ $video->id }})" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                                
                            </div>
                           

                            @endif
                        </div>
                    </div>
                </div>

                @endforeach
                @else
                <h1> No Videos </h1>

                @endif

<!-- Modal -->
            <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true close-btn">×</span>
                            </button>
                        </div>
                       <div class="modal-body">
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                            <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            </div>

            <nav class="blog-pagination justify-content-center d-flex">
						<ul class="pagination">
							{{ $videos->links() }}
						</ul>
					</nav>

							{{-- <div class="popular-post-list">
								<div class="single-post-list d-flex flex-row align-items-center">
									<div class="thumb">
										<img class="img-fluid" src="{{ asset('template/img/blog/pp1.jpg') }}" alt="">
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
										<img class="img-fluid" src="{{ asset('template/img/blog/pp1.jpg') }}" alt="">
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
										<img class="img-fluid" src="{{ asset('template/img/blog/pp1.jpg') }}" alt="">
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
										<img class="img-fluid" src="{{ asset('template/img/blog/pp1.jpg') }}" alt="">
									</div>
									<div class="details">
										<a href="blog-single.html">
											<h6>Asteroids telescope</h6>
										</a>
										<p>02 Hours ago</p>
									</div>
								</div>
							</div> --}}
						</div>
						
					</div>
			</div>