<?php

use App\Models\Video;
use App\Models\Channel;
use Illuminate\Support\Carbon;
use App\Http\Livewire\Video\AllVideo;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\WatchVideo;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Controllers\SerachController;
use App\Http\Controllers\ChannelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // if Logind -- menampilkan apa pun yang aku subscribe

    // if(Auth::check()){
    //     $channels = Auth::user()->subscribedChannels()->with('videos')->get()->pluck('videos');
        
    // }else{
        $channels = Channel::latest()->get()->pluck('publicvideo');
    // }

    return view('welcome', compact('channels'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test' , function(){
    return view('test');
});

Route::middleware('auth')->group( function(){
    Route::get('/channel/{channel}/edit', [ChannelController::class, 'edit'])->name('channel.edit');
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
    Route::post('/profileupdate/{id}', [UserController::class, 'profileupdate'])->name('profileupdate');
    //View Change Password
    Route::get('/changepassword', [UserController::class, 'changepassword'])->name('changepassword');

    //Update Password
    Route::post('/updatepassword', [UserController::class, 'updatepassword'])->name('updatepassword'); 
});


Route::middleware('auth')->group( function(){
     Route::get('/videos/{channel}/create', CreateVideo::class)->name('video.create');
     Route::get('/videos/{channel}/{video}/edit', EditVideo::class)->name('video.edit');
     Route::get('/allvideo/{channel}', AllVideo::class)->name('video.all');
});


Route::get('/watch/{video}' , WatchVideo::class)->name('video.watch');
Route::get('/channels/{channel}' , [ChannelController::class, 'index'])->name('channel.index');
Route::get('/search', [SerachController::class, 'search'])->name('search');


Route::get('/subscriptions', function () {
    // if Logind -- menampilkan apa pun yang aku subscribe
    //  $now = Carbon::now();
    //  $videos = Video::where('visibility','public')->orderBy('views', 'desc')->whereMonth('created_at', $now->month)->take(4)->get();

    // dd($videos);

    if(Auth::check()){
    // $channels = Auth::user()->subscribedChannels()->with('videos')->get()->pluck('videos');
    $channels = Auth::user()->subscribedChannels()->with('publicvideo')->get()->pluck('publicvideo');

    //dd($channels);
    }else{
        $channels = Channel::get()->pluck('videos');
    }

    return view('subscription', compact('channels'));
});

Route::get('/tranding', function () {
    // if Logind -- menampilkan apa pun yang aku subscribe
    $now = Carbon::now();

    $start = $now->startOfWeek(Carbon::TUESDAY);
    $end = $now->endOfWeek(Carbon::MONDAY);
        // echo $now->year;
        // echo $now->month;
        // echo $now->weekOfYear;
        //berdasarkan bulan
       // $videos = Video::where('visibility','public')->orderBy('views', 'desc')->whereMonth('created_at', $now->month)->take(4)->get();
        $fromDate = new Carbon('last week'); 
        $toDate = new Carbon('now'); 
      
        //berdasarkan tahun
        $videos = Video::where('visibility','public')->orderBy('views', 'desc')->whereBetween('created_at', array($fromDate->toDateTimeString(), $toDate->toDateTimeString()))->take(100)->get();
        //dd($videos);
    

    return view('tranding', compact('videos'));
});




Route::get('/testviews', function () {
    $n = 60;
    if ($n > 0 && $n < 1000) {
		// 1 - 999
		$n_format = floor($n);
		$suffix = '';
	} else if ($n >= 1000 && $n < 1000000) {
		// 1k-999k
		$n_format = floor($n / 1000);
		$suffix = 'K+';
	} else if ($n >= 1000000 && $n < 1000000000) {
		// 1m-999m
		$n_format = floor($n / 1000000);
		$suffix = 'M+';
	} else if ($n >= 1000000000 && $n < 1000000000000) {
		// 1b-999b
		$n_format = floor($n / 1000000000);
		$suffix = 'B+';
	} else if ($n >= 1000000000000) {
		// 1t+
		$n_format = floor($n / 1000000000000);
		$suffix = 'T+';
	}

	$dia = !empty($n_format . $suffix) ? $n_format . $suffix : 0;
    
    //return view('tranding', compact('videos'));
});





