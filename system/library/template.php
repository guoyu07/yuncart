<?php

class Template
{
    private $registry;
    private $adaptor;

    public function __construct($registry)
    {
        $this->registry = $registry;
        
        $adaptor = $this->registry->get('config')->get('template_type');
        $class = 'Template\\' . $adaptor;

        if (class_exists($class)) {
            $this->adaptor = new $class($this->registry);
        } else {
            throw new \Exception('Error: Could not load template adaptor ' . $adaptor . '!');
        }
    }

    public function set($key, $value)
    {
        $this->adaptor->set($key, $value);
    }

    public function render($template)
    {
        return $this->adaptor->render($template);
    }

}
