<?php

namespace Malarrimo\Managers;

use Illuminate\Support\MessageBag;

abstract class ManagerBase
{

    /**
     * @var \Eloquent
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
     * @param /Eloquent $entity
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
     * @return array
     */
    public function getMessages()
    {
        return [];
    }

    /**
     * @return null|int
     */
    public function getId()
    {
        return $this->entity->id ?: null;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        $validation = \Validator::make($this->data, $rules, $messages);

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

    /**
     * @return \Eloquent
     */
    public function getEntity()
    {
        return $this->entity;
    }

} 