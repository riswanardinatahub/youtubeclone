<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ConvertVideoForStreaming;
use App\Jobs\CreateThumbnailFromVideo;

class CreateVideo extends Component
{
    use WithFileUploads;
    public Channel $channel;
    public Video $video;
    public $videoFile;

    protected $rules = [
        'videoFile' => 'required|mimes:mp4|max:10240'
    ];

    public function mount(Channel $channel){
        $this->channel = $channel;
    }


    public function render()
    {
        return view('livewire.video.create-video')->extends('layouts.app');
    }

    public function fileCompleted(){
        // dd('file complate');

        //validation
        $this->validate();

        //save file

        $path = $this->videoFile->store('videos-temp');

        //creae video record in sb
        $this->video = $this->channel->videos()->create([
            'title' => 'untitled',
            'description' => 'none',
            'uid' => uniqid(true),
            'visibility' => 'private',
            'village_name' => Auth::user()->channel->village,
            'path' => explode('/', $path)[1],
        ]); 


        // dispatch job
        CreateThumbnailFromVideo::dispatch($this->video);
        ConvertVideoForStreaming::dispatch($this->video);


        //redirect to edit route
        return redirect()->route('video.edit',[
            'channel' => $this->channel,
            'video' => $this->video,
        ]);

    }

     
}
