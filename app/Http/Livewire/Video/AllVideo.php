<?php

namespace App\Http\Livewire\Video;

use auth;
use App\Models\Video;
use App\Models\Channel;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AllVideo extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    protected $paginationTheme = 'bootstrap';
   
    public $channel;

    public $deleteId = '';

    public function mount(Channel $channel){
        $this->channel = $channel;
    }

    

    public function render()
    {
        return view('livewire.video.all-video')
        ->with('videos', $this->channel->videos()->latest()->paginate(3))
        ->extends('layouts.app');
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete(){
        
        $data = Video::find($this->deleteId);
        //dd($data);
        //cek allow user delete video
       // $this->authorize('delete', $data);

       
        //delete folder
        $deleted =Storage::disk('videos')->deleteDirectory($data->uid);

        if($deleted){
            $data->delete();
        }

        return back();

    }


}
