<?php

namespace Malarrimo\Repositories;

use ReflectionClass;

class Base
{

    /**
     * @var \Eloquent
     */
    protected $entityName;

    public function __construct()
    {
        $reflection = new ReflectionClass($this);
        $this->entityName = 'Malarrimo\Entities\\' . $reflection->getShortName();
    }

    /**
     * @param $id
     * @return \Illuminate\Support\Collection|static
     */
    public function find($id)
    {
        $class = $this->entityName;
        return $class::find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        $class = $this->entityName;
        return $class::all();
    }

    /**
     * @return \Eloquent
     */
    public function newInstance()
    {
        $class = $this->entityName;
        return new $class();
    }

    /**
     * @param $id
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        $class = $this->entityName;
        return $class::find($id)->delete();
    }

    /**
     * @return \Eloquent
     */
    protected function getEntity()
    {
        return $this->entityName;
    }

} 