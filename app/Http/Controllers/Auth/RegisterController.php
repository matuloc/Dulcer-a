<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Direccion;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/Productos';

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
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
            'apellido' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
            'direccion' => 'required|min:2|max:40',
            'rut'=>'required|numeric',
            'telefono'=>'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'telefono' =>'required|numeric',
            'direccion'=>'required|string',
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
        $new_user=new User;
        $new_user->nombre=$data['nombre'];
        $new_user->apellido=$data['apellido'];
        $new_user->rut=$data['rut'];
        $new_user->direccion=$data['direccion'];
        $new_user->telefono=$data['telefono'];
        $new_user->email=$data['email'];
        $new_user->password=bcrypt($data['password']);
        $new_user->save();
        return $new_user;

    }
}
