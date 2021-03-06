<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Registered;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
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
        $user = User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'nickname' => $data['nickname'],
            'credit' => $data['credit'],
            'email' => $data['email'],
            'birthDate' => $data['birthDate'],
            'imgPath' => '/images/users/profileDefault.png',
            'password' => Hash::make($data['password']),
        ]);

        

        $role = Role::select('id')->where('name', 'user')->first();

        $user->roles()->attach($role);
        Mail::to($user->email)
            ->send(new Registered([
                'firstName' => $user->firstName, 
                'lastName' => $user->lastName,
                'emailCompany' => 'contactEkip@ceqonveut.com',
                'email' => $user->email,
                'companyName' => 'Gamingue']));

        return $user;
    }
}
