<?php

namespace Malarrimo\Managers;


use Input;
use Str;

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
            'language' => 'required',
            'user_id' => 'required',
            'keywords' => '',
            'image' => 'image|max:1000',
        ];

        return $rules;
    }

    public function save()
    {
        if (!$this->isValid())
        {
            return false;
        }

        $this->uploadImage('image');

        $this->entity->fill($this->data);
        $this->entity->save();

        return true;
    }

    /**
     * @param string $fieldName
     */
    public function uploadImage($fieldName)
    {
        $file = Input::file($fieldName);
        if ($file)
        {
            $fileName = Str::slug($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $img = $file->move('uploads/news', $fileName);

            if ($img)
            {
                $this->data['image'] = $img->getFilename();
            }
        }
    }

}