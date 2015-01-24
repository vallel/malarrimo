<?php

class AuthController extends BaseController {

    public function showLogin()
    {
        if (Auth::check())
        {
            return Redirect::route('admin.news');
        }

        return View::make('admin/login');
    }

    public function login()
    {
        $data = Input::all();

        $credentials = array(
            'email' => $data['email'],
            'password' => $data['password'],
        );

        if (Auth::attempt($credentials))
        {
            return Redirect::back();
        }

        return Redirect::back()->with('error', 'Usuario y/o contraseña inválidos');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('admin');
    }

} 