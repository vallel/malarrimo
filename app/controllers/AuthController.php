<?php

class AuthController extends BaseController {

    public function login()
    {
        $data = Input::all();

        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if (Auth::attempt($credentials))
        {
            return Redirect::back();
        }

        return Redirect::back()->with('error', 'Usuario y/o contraseña inválidos');
    }

} 