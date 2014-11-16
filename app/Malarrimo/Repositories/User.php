<?php

namespace Malarrimo\Repositories;

use Malarrimo\Entities\User as UserEntity;

class User {

    public function getAll()
    {
        return UserEntity::all();
    }

    public function newUser()
    {
        return new UserEntity();
    }

} 