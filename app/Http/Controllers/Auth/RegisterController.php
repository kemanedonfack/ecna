<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\RegisterMail;
use App\Events\UserRegisterEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        
        $var = url('image/kemane.jpg');
        return Validator::make($data, [

            'avatar' => ['image'],
            'nom' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

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

        if(isset($data['avatar'])){
            
            $imagePath = request('avatar')->store('avatars','public');
            

            $status = 0;
            $user = User::create([
                'name' => $data['nom'],
                'email' => $data['email'],
                'avatar' => $imagePath,
                'password' => Hash::make($data['password']),
                'status' => $status,
            ]);
             
            Mail::to($data['email'])->send(new RegisterMail($data));

            return $user;

        }

        $var = 'DefaultAvatar/avatar.jpg';
            $status = 0;
            
                $user = User::create([
                'name' => $data['nom'],
                'email' => $data['email'],
                'avatar' => $var,
                'password' => Hash::make($data['password']),
                'status' => $status,
            ]);

            Mail::to($data['email'])->send(new RegisterMail($data));

            return $user;
    }
}
