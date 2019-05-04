<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Image;

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
            'real_name' => ['required', 'string', 'max:255'],
            'real_lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500000'
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

        $companys_user_permission = array( 1 );
        $companys_user_permission_serialize = serialize( $companys_user_permission );

   /*    $path = $data['avatar']->store('public/users/photo');*/

        $path = public_path()."/users/photo/";
        $img = Image::make($data['avatar'])->heighten(100)->crop(100, 100)->encode('png');
        $img->save($path . str_random(10) . str_random(10) . ".png");

        return User::create([
            'name' => $data['name'],
            'real_name' => $data['real_name'],
            'real_lastname' => $data['real_lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' =>  '/users/photo/'.$img->basename,
            'companys_user_permission' => $companys_user_permission_serialize,
            'companys_admin_permission' => '',
            'theme' => 'default',
            'global_admin_permission' => false,
        ]);
    }
}
