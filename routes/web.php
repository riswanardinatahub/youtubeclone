<?php

use App\Models\Video;
use App\Models\Channel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use App\Http\Livewire\Video\AllVideo;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\WatchVideo;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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
        //$channels = Channel::latest()->get()->pluck('publicvideo');


        $channels = Video::where('visibility','public')->latest()->get();
       // dd($data);
    // }

    return view('welcome', compact('channels'));
});

Route::post('autoLogin',[AuthController::class, 'autoLogin']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/test' , function(){
    return view('test');
});

Route::get('/carivideo', [HomeController::class, 'carivideo'])->name('carivideo');

Route::middleware('auth')->group( function(){
    Route::get('/channel/{channel}/edit', [ChannelController::class, 'edit'])->name('channel.edit');
    Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
    Route::post('/profileupdate/{id}', [UserController::class, 'profileupdate'])->name('profileupdate');
    //View Change Password
    Route::get('/changepassword', [UserController::class, 'changepassword'])->name('changepassword');

    //Update Password
    Route::post('/updatepassword', [UserController::class, 'updatepassword'])->name('updatepassword'); 

    Route::get('/datauser', [AdminController::class, 'datauser'])->name('datauser');
    Route::get('/deleteuser/{id}',[AdminController::class, 'deleteuser'])->name('deleteuser');

    Route::get('/datalaporan', [AdminController::class, 'datalaporan'])->name('datalaporan');

    //laporan
    Route::post('/report', [AdminController::class, 'report'])->name('report');
    Route::get('/tolakreport/{id}', [AdminController::class, 'tolakreport'])->name('tolakreport');
    Route::get('/videodelete/{id}', [AdminController::class, 'videodelete'])->name('videodelete');


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
    $channels = Auth::user()->subscribedChannels()->with('publicvideo')->latest()->get()->pluck('publicvideo');

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





