<?php

namespace Malarrimo\Repositories;

use Malarrimo\Entities\User as UserEntity;

class User {

    /**
     * @return UserEntity[]
     */
    public function getActives()
    {
        return UserEntity::where('status', '=', 'Active')->get();
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function create($name, $email, $password)
    {
        $user = new UserEntity();
        $user->user_name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->status = 'Active';
        $user->save();
    }

} 