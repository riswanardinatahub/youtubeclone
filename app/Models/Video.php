<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Storage;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['thumbnail'];

    public function getRouteKeyName(){
        return 'uid';
    }

    public function getThumbnailAttribute(){

        if($this->thumbnail_image){
            // return env('APP_URL') . Storage::url('videos/' . $this->uid . '/' . $this->thumbnail_image);
            return '/storage/videos/' . $this->uid . '/' . $this->thumbnail_image;

        }else{
        return '/videos/' . 'default.png'; // ini nanti tambahin gambar tapi jangandi storage okey

        }
        
    }
    public function getUploadedDateAttribute(){
        $carbon = new Carbon($this->created_at);
        return $carbon->toFormattedDateString();
    }

    public function channel(){
        return $this->belongsTo(Channel::class, 'channel_id','id');
    }
    
    public function likes(){
        return $this->hasMany(Like::class);
    }

     public function dislikes(){
        return $this->hasMany(Dislike::class);
    }

    public function doesUserLikedVideo(){
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function doesUserDislikeVideo(){
        return $this->dislikes()->where('user_id', auth()->id())->exists();
    }

    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('reply_id');
    }
    
     public function AllcommntsCount(){
        return $this->hasMany(Comment::class)->count();
    }

    
}
