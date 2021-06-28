<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\Report;
use App\Models\Channel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function datauser(){

        $data = User::paginate(10);
       // dd($data);
        return view('admin.datauser',compact('data'));
    }


    public function deleteuser($id){
       
        $data = User::find($id);
        $data->channel->delete();
        $data->delete();
        return redirect()->back();
    }

    public function report(Request $request){
        // dd($request->all());
        Report::create($request->all());

        return redirect()->back();
    }


    public function datalaporan(){
        $data = Report::paginate(10);
        return view('admin.datalaporan', compact('data'));
    }


    public function tolakreport($id){
       
        $data = Report::find($id);
        $data->delete();
        return redirect()->back();
    }


     public function videodelete($id){
        $data = Video::find($id);
        Report::where('videos_id',$id)->delete();
        $data->delete();
        return redirect()->route('datalaporan');
    }


    
    
}
