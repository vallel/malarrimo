<?php

namespace Malarrimo\Managers;


use Input;
use Intervention\Image\Facades\Image;
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
            $fileName = uniqid('news_') . '.' . $file->getClientOriginalExtension();
            $img = $file->move('uploads/news', $fileName);

            if ($img)
            {
                Image::make(sprintf('uploads/news/%s', $img->getFilename()))->fit(540, 250, function ($constraint) {
                    $constraint->upsize();
                })->save();
                $this->data['image'] = $img->getFilename();
            }
        }
    }

}