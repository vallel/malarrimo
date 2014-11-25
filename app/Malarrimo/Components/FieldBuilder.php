<?php

namespace Malarrimo\Components;

use Illuminate\Filesystem\Filesystem as File;
use Illuminate\Html\FormBuilder as Form;
use Illuminate\Session\Store as Session;
use Illuminate\View\Factory as View;

/**
 * Class FieldBuilder
 * @package Malarrimo\Components
 */
class FieldBuilder
{

    /** @var Form  */
    protected $form;

    /** @var View  */
    protected $view;

    /** @var Session  */
    protected $session;

    /** @var File  */
    protected $file;

    /** @var array  */
    protected $defaultClasses = [
        'default' => 'form-control',
        'checkbox' => '',
    ];

    /**
     * @param Form $form
     * @param View $view
     * @param Session $session
     * @param File $file
     */
    public function __construct(Form $form, View $view, Session $session, File $file)
    {
        $this->form = $form;
        $this->view = $view;
        $this->session = $session;
        $this->file = $file;
    }

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
                return $this->form->select($name, $options, $value, $attributes);
            case 'password':
                return $this->form->password($name, $attributes);
            case 'checkbox':
                return $this->form->checkbox($name);
            case 'textarea':
                return $this->form->textarea($name, $value, $attributes);
            default:
                return $this->form->input($type, $name, $value, $attributes);
        }
    }

    /**
     * @param string $name
     * @return null|string
     */
    public function buildError($name)
    {
        $error = null;

        if ($this->session->has('errors'))
        {
            $errors = $this->session->get('errors');

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
        if ($this->file->exists('app/views/fields/' . $type . '.blade.php'))
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

        return $this->view->make($template, compact('name', 'label', 'control', 'error'));
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