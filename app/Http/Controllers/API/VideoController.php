<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Video;
use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class VideoController extends Controller
{
    public function getvideo(){
        return Video::where('visibility','public')->latest()->take(5)->get();
    }

        
    public function register(Request $request)
    {
        $array = array();
        $array["name"] =  $request->name;
        $array["email"] =  $request->email;
        $array["password"] = Hash::make($request->password);
        $array["provinces_id"] = $request->provinces_id;
        $array["regencies_id"] = $request->regencies_id;
        $array["districts_id"] = $request->districts_id;
        $array["villages_id"] = $request->villages_id;
        
        $mail = User::where('email',"=",$request->email)->get();
        if($mail->count()>0){
            return response()->json([
                'error'=>1,
                'message'=>'Email sudah terdaftar, silahkan gunakan email lainaaaa.'
            ],200);
        }else{
 
            if(empty($request->email)||empty($request->password)||empty($request->villages_id)){
                return response()->json([
                    'error'=>1,
                    'message'=>'Tidak boleh ada kolom yang kosong.'
                ],200);
            }else{
                $user = User::create($array);
                 $datavillage = Village::where('id', $user->villages_id)->value('name');
                    $user->channel()->create([
                        'user_id' => $user->id,
                        'name' => $request->name,
                        'village' => $datavillage,
                        'slug' => Str::slug($request->name,'-'),
                        'uid' => uniqid(true),
                    ]);
                if($user){
                    return response()->json([
                        'success'=>1,
                        'message'=>'Akun Berhasil Didaftarkan a.'
                    ],200);
 
                }else{
                    return response()->json([
                        'error'=>1,
                        'message'=>'Terjadi masalah, coba lagi nanti.'
                    ],200);
                }
            }
 
 
        }

    }
}
