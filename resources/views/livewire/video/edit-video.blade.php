
 

 <div class="row justify-content-center mt-5">
<div class="col-lg-6  sidebar-widgets ">
    <div class="widget-wrap">
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="popular-title">Edit Video</h4>
        </div>
        <div @if ($video->processing_percentage < 100) wire:poll @endif>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset($this->video->thumbnail) }}" class="img-thumbnail" alt="">
                    </div>

                    <div class="col-md-4">
                        <p> Processing ({{ $this->video->processing_percentage }}) %</p>
                    </div>
                </div>

                <form wire:submit.prevent="update">

                    <div class="form-group">
                        <label for="title"> title</label>
                        <input type="text" class="form-control" wire:model="video.title">
                    </div>
                    @error('video.title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror


                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea cols="30" rows="4" class="form-control" wire:model="video.description"> </textarea>
                    </div>

                    @error('video.description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror


                    <div class="form-group">
                        <label for="visibility">visibility</label>
                        <select wire:model="video.visibility" class="form-control">
                            <option value="private">private</option>
                            <option value="public">public</option>
                        </select>
                    </div>

                    @error('video.description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="form-group">
                        <button type="submit" class="genric-btn success radius">Update</button>
                    </div>

                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </form>

            </div>
        </div>
    </div>
</div>
    </div>
</div>

 </div>

