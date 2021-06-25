<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EditChannel extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $channel;
    public $images;
    protected function rules() {
    return [
        'channel.name' => 'required|max:255|unique:channels,name,' . $this->channel->id,
        'channel.slug' => 'required|max:255|unique:channels,slug,' . $this->channel->id,
        'channel.description' => 'nullable|max:1000',
        'images' => 'nullable|image|max:1024',
    ];
    }
        


    public function mount(Channel $channel){
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function update(){
        $this->authorize('edit', $this->channel);

        $this->validate();
        $this->channel->update([
            'name' => $this->channel->name,
            'slug' => $this->channel->slug,
            'description' => $this->channel->description

        ]);
        
        // cek file image di submit
        if($this->images){
            //save image

            $image = $this->images->storeAs('images', $this->channel->uid . '.png');
            $imageImage = explode('/',$image)[1];
            //resize and convert to img
            $img = Image::make(storage_path() . '/app/' .$image)
            ->encode('png')->fit(80, 80, function ($constraint) {
                    $constraint->upsize();
                })->save();
             //update file
            $this->channel->update([
                'images'=> $imageImage
            ]);

        }
        

       
        session()->flash('message', 'Channel Update');
        return redirect()->route('channel.edit', ['channel' => $this->channel->slug]);

    }
    
}
