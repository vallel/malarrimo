<?php

namespace Malarrimo\Repositories;

use Malarrimo\Entities\User as UserEntity;

class User {

    public function getActives()
    {
        return UserEntity::where('status', '=', 'Active')->get();
    }

} 