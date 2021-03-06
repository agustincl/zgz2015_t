<?php
namespace Application;

use Application\Options\Options;
use Utils\Model\Options as Option;
use Utils\Interfaces\OptionsAwareInterface;

class Module
{
    public $options;
    protected $content;
    protected $layout;


    public function __construct($router)
    {
        $this->options = new Options();
        new Option($router['module'], $this->options);
        
        $classname = $router['module'].'\\Controller\\'.
            $router['controller'];
        
        $actionname = $router['action']."Action";
          
        /**
         * Dependence Injection by constructor
         * @var unknown
         */
        /*
        $class = new $classname($router, $this->options);
        $this->content = $class->$actionname(); 
        $this->layout = $class->layout;
        */
        
        
        $class = new $classname($router);
        if($class instanceof OptionsAwareInterface)
            $class->setOptions($this->options);
        
        $this->content = $class->$actionname();
        $this->layout = $class->layout;
        
    }
    
    /**
     * @return the $content
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * @return the $layout
     */
    public function getLayout()
    {
        return $this->layout;
    }
    
    /**
     * @param field_type $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
    
    /**
     * @param field_type $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    
}