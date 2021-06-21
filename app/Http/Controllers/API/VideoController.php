<?php

namespace App\Http\Controllers\API;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function getvideo(){
        return Video::where('visibility','public')->latest()->take(5)->get();
    }
}
