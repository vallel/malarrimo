<?php

namespace Malarrimo\Managers;

class PictureManager extends ManagerBase
{

    /**
     * @return array
     */
    public function getRules()
    {
        $rules = [
            'file_name' => 'required',
            'gallery_id' => 'required',
        ];

        return $rules;
    }

}