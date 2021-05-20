<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'provinces_id' => ['required'],
            'regencies_id' => ['required'],
            'districts_id' => ['required'],
            'villages_id' => ['required'],
            'channel_name' => ['required', 'string', 'min:4', 'unique:channels,name'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'provinces_id' => $data['provinces_id'],
                'regencies_id' => $data['regencies_id'],
                'districts_id' => $data['districts_id'],
                'villages_id' => $data['villages_id'],
                'password' => Hash::make($data['password']),
            ]);

            $datavillage = Village::where('id', $user->villages_id)->value('name');
            $user->channel()->create([
                'user_id' => $user->id,
                'name' => $data['channel_name'],
                'village' => $datavillage,
                'slug' => Str::slug($data['channel_name'],'-'),
                'uid' => uniqid(true),
            ]);
            return $user;
        
    }
}
