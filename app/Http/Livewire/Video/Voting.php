<?php

namespace App\Http\Livewire\Video;

use auth;
use App\Models\Like;
use App\Models\Video;
use App\Models\Dislike;
use Livewire\Component;

class Voting extends Component
{
    public $video;

    public $likes;
    public $dislikes;

    public $likeActive;
    public $dislikeActive;


    protected $listeners = ['load_values' => '$refresh'];

    public function mount(Video $video){
        $this->video = $video;
        $this->chekIfLiked();
        $this->chekIfDisliked();
    }

    public function chekIfLiked(){
        $this->video->doesUserLikedVideo() ? $this->likeActive = true : $this->likeActive = false;
    }

    public function chekIfDisliked(){
        $this->video->doesUserDislikeVideo() ? $this->dislikeActive = true : $this->dislikeActive = false;
    }


    public function render()
    {
        $this->likes = $this->video->likes->count();
        $this->dislikes = $this->video->dislikes->count();
        return view('livewire.video.voting')->extends('layouts.app');
    }

    public function like(){

        if(Auth::check()){
// cek user aktive like video
        if($this->video->doesUserLikedVideo()){
            //remove the user
            Like::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
            $this->likeActive = false;
        }else{
            $this->video->likes()->create([
                'user_id' => auth()->id()
            ]);
            $this->disableDislike();
            $this->likeActive = true;
        }
        $this->emit('load_values');
        }else{
            return \redirect()->route('login');
        }
        
        
    }

    public function gotologin(){
        return \redirect()->route('login');
    }
    
    public function dislike(){
        // cek user aktive dislike video
        if($this->video->doesUserDislikeVideo()){
            //remove the user
            Dislike::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
            $this->dislikeActive = false;
        }else{
            $this->video->dislikes()->create([
                'user_id' => auth()->id()
            ]);
             $this->disableLike();
            $this->dislikeActive = true;
        }

        $this->emit('load_values');
        
    }

    public function disableDislike(){
         Dislike::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
         $this->dislikeActive = false;
    }

    public function disableLike(){
         Like::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
         $this->likeActive = false;
    }
}
