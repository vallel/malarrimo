<?php

namespace Malarrimo\Components;

/**
 * Class FieldBuilder
 * @package Malarrimo\Components
 */
class FieldBuilder
{

    /**
     * @var array
     */
    protected $defaultClasses = [
        'default' => 'form-control',
        'checkbox' => '',
    ];

    /**
     * @param string $method
     * @param array $params
     * @return mixed
     */
    public function __call($method, $params)
    {
        array_unshift($params, $method);
        return call_user_func_array([$this, 'input'], $params);
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function getDefaultClass($type)
    {
        if (isset($this->defaultClasses[$type]))
        {
            return $this->defaultClasses[$type];
        }

        return $this->defaultClasses['default'];
    }

    /**
     * @param string $type
     * @param array $attributes
     */
    public function buildCssClasses($type, &$attributes)
    {
        $defaultClasses = $this->getDefaultClass($type);

        if (isset($attributes['class']))
        {
            $attributes['class'] .= ' ' . $defaultClasses;
        }
        else
        {
            $attributes['class'] = $defaultClasses;
        }
    }

    /**
     * @param string $type
     * @param string $name
     * @param null|string $value
     * @param array $attributes
     * @param array $options
     * @return string
     */
    public function buildControl($type, $name, $value = null, $attributes = array(), $options = array())
    {
        switch($type)
        {
            case 'select':
                return \Form::select($name, $options, $value, $attributes);
            case 'password':
                return \Form::password($name, $attributes);
            case 'checkbox':
                return \Form::checkbox($name);
            default:
                return \Form::input($type, $name, $value, $attributes);
        }
    }

    /**
     * @param string $name
     * @return null|string
     */
    public function buildError($name)
    {
        $error = null;

        if (\Session::has('errors'))
        {
            $errors = \Session::get('errors');

            if ($errors->has($name))
            {
                $error = $errors->first($name);
            }
        }

        return $error;
    }

    /**
     * @param string $type
     * @return string
     */
    public function buildTemplate($type)
    {
        if (\File::exists('app/views/fields/' . $type . '.blade.php'))
        {
            return 'fields/' . $type;
        }

        return 'fields/default';
    }

    /**
     * @param string $type
     * @param string $name
     * @param string $label
     * @param null|string $value
     * @param array $attributes
     * @param array $options
     * @return \Illuminate\View\View
     */
    public function input($type, $name, $label, $value = null, $attributes = array(), $options = array())
    {
        $this->buildCssClasses($type, $attributes);
        $control = $this->buildControl($type, $name, $value, $attributes, $options);
        $error = $this->buildError($name);
        $template = $this->buildTemplate($type);

        return \View::make($template, compact('name', 'label', 'control', 'error'));
    }

    /**
     * @param string $name
     * @param string $label
     * @param array $attributes
     * @return \Illuminate\View\View
     */
    public function password($name, $label, $attributes = array())
    {
        return $this->input('password', $name, $label, null, $attributes);
    }

} 