<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/home';

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
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //Registers the user lat & long in db
        $address =$data['address'];
        $lat = '';
        $long = '';
        if($address) {
            $uri = 'https://geocoder.api.here.com/6.2/geocode.json?app_id=4lbg6bNUqJVj80BOpcoj&app_code=derEmKtRJUQiPFW5bgUzaQ&searchtext='.urlencode($address);
            $json = file_get_contents($uri);
            $arr = json_decode($json, true);
            if(!empty($arr['Response']['View'])) {
                $lat = $arr['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Latitude'];
                $long = $arr['Response']['View'][0]['Result'][0]['Location']['DisplayPosition']['Longitude'];
            }
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'lat' => $lat,
            'long' => $long
        ]);
    }
}
