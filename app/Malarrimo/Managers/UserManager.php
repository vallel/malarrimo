<?php

namespace Malarrimo\Managers;


class UserManager extends ManagerBase
{

    /**
     * @return array
     */
    public function getRules()
    {
        $rules = [
            'user_name' => '',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ];

        return $rules;
    }

}