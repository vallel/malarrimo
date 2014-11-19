<?php

namespace Malarrimo\Managers;


class UserManager extends ManagerBase
{

    /**
     * @return array
     */
    public function getRules()
    {
        $id = $this->getId();
        $validateId = empty($id) ? '' : ',' . $id;

        $rules = [
            'user_name' => '',
            'email' => 'required|email|unique:users,email' . $validateId,
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ];

        return $rules;
    }

}