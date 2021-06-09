<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use Livewire\Component;

class WatchVideo extends Component
{
    public $video;

    protected $listeners = ['VideoViewed' => 'countView'];

    public function mount(Video $video){
        $this->video = $video;
    }
    public function render()
    {
        $channels = Channel::get()->pluck('publicvideo');
        return view('livewire.video.watch-video',\compact('channels'))->extends('layouts.app');
    }

    public function countView(){
        $this->video->update([
            'views' => $this->video->views + 1
        ]);
    }
}
