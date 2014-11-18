<?php namespace Malarrimo\Components;

use Illuminate\Support\Facades\Facade;

/**
 * Class Field
 * @package Malarrimo\Components
 */
class Field extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'field'; }

}