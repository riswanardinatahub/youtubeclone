<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function carivideo(Request $request){

  

        $provinces_id = $request->provinces_id;
        $regencies_id = $request->regencies_id;
        $districts_id = $request->districts_id;
        $villages_id = $request->villages_id;
     

            if($request->villages_id){
                $videos = Video::with('channel.user')
                ->whereHas('channel.user', function($coba) use($villages_id){
                    $coba->where('villages_id', $villages_id);
                })->get();
                 
            }elseif($request->districts_id){
                $videos = Video::with('channel.user')
                ->whereHas('channel.user', function($coba) use($districts_id){
                    $coba->where('districts_id', $districts_id);
                })->get();

            }elseif($request->regencies_id){
                $videos = Video::with('channel.user')
                ->whereHas('channel.user', function($coba) use($regencies_id){
                    $coba->where('regencies_id', $regencies_id);
                })->get();

            }elseif($request->provinces_id){
               $videos = Video::with('channel.user')
                ->whereHas('channel.user', function($coba) use($provinces_id){
                    $coba->where('provinces_id', $provinces_id);
                })->get();
                
            }else{
                $videos = '';
            }


        return view('carivideo', compact('videos'));
       
    }

}
