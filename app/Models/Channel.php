<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['images_url']; // ini nanti diambilnya $channel->image_url, tapi ini asalnya dari accessor

    public function getRouteKeyName(){
        return 'slug';
    }

    public function user() {
    
        return $this->belongsTo(User::class);

    }

     public function getImagesUrlAttribute() {
        return $this->images ? '/storage/images/' . $this->images : '/foto/channel-default.png';
    }
    public function publicvideo()
    {
        return $this->hasMany(Video::class)->where('visibility','public')->latest();
    }

     public function videos()
    {
        return $this->hasMany(Video::class)->latest();
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function subscribers()
    {
        return $this->subscriptions->count();
    }

    
}
