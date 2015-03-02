<?php

namespace Malarrimo\Managers;


use Exception;
use Input;
use Intervention\Image\Facades\Image;

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
            'image' => 'image|max:2048',
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
     * @throws Exception
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
                try
                {
                    $image = Image::make(sprintf('uploads/news/%s', $img->getFilename()));

                    // resize original image
                    $image->fit(540, 250, function ($constraint) {
                        $constraint->upsize();
                    })->save();

                    // create thumbnail
                    $thumbDir = public_path() . '/uploads/news/thumb/';
                    $image->fit(250, 150, function ($constraint) {
                        $constraint->upsize();
                    })->save($thumbDir . $img->getFilename());

                    $this->data['image'] = $img->getFilename();
                }
                catch(Exception $ex)
                {
                    $this->deletePostImages($img->getFileName());
                    throw $ex;
                }
            }
        }
    }

    /**
     * @param string $image
     */
    public function deletePostImages($image)
    {
        $imagePaths = array(
            public_path() . '/uploads/news/' . $image,
            public_path() . '/uploads/news/thumb/' . $image,
        );
        foreach ($imagePaths as $file)
        {
            if (file_exists($file))
            {
                unlink($file);
            }
        }
    }

}