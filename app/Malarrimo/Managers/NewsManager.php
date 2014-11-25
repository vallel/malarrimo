<?php

namespace Malarrimo\Managers;


class NewsManager extends ManagerBase
{

    /**
     * @return array
     */
    public function getRules()
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
            'keywords' => '',
            'status' => '',
        ];

        return $rules;
    }

    public function save()
    {
        if (!isset($this->data['status']))
        {
            $this->data['status'] = 0;
        }

       return parent::save();
    }

}