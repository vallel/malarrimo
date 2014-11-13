<?php

namespace Malarrimo\Managers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;

abstract class ManagerBase
{

    /**
     * @var Model
     */
    protected $entity;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var MessageBag
     */
    protected $errors;

    /**
     * @param Model $entity
     * @param array $data
     */
    public function __construct($entity, $data)
    {
        $this->entity = $entity;
        $this->data = array_only($data, array_keys($this->getRules()));
    }

    /**
     * @return array
     */
    abstract public function getRules();

    /**
     * @return bool
     */
    public function isValid()
    {
        $rules = $this->getRules();
        $validation = \Validator::make($this->data, $rules);

        $this->errors = $validation->messages();

        return $validation->passes();
    }

    /**
     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
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