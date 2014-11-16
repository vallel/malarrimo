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

    /**
     * @return bool
     */
    public function save()
    {
        if (!$this->isValid())
        {
            return false;
        }

        $this->entity->fill($this->data);
        $this->entity->save();

        return true;
    }

}