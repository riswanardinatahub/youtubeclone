<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function user() {
    
        return $this->belongsTo(User::class);

    }

     public function getPictureAttribute(){

        if($this->images){
        return '/images/' . $this->images;

        }else{
        return '/foto/' . 'channel-default.png';

        }
        
    }
    public function publicvideo()
    {
        return $this->hasMany(Video::class)->where('visibility','public')->latest();
    }

     public function videos()
    {
        return $this->hasMany(Video::class);
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
