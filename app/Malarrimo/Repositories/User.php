<?php

namespace Malarrimo\Repositories;

use Malarrimo\Entities\User as UserEntity;

class User {

    /**
     * @param $id
     * @return \Illuminate\Support\Collection|static
     */
    public function find($id)
    {
        return UserEntity::find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return UserEntity::all();
    }

    /**
     * @return UserEntity
     */
    public function newUser()
    {
        return new UserEntity();
    }

    /**
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        return UserEntity::find($id)->delete();
    }

} 