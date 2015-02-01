<?php

namespace Malarrimo\Managers;

class GalleryManager extends ManagerBase
{

    /**
     * @return array
     */
    public function getRules()
    {
        $rules = [
            'title' => 'required',
            'date' => 'required',
        ];

        return $rules;
    }

}