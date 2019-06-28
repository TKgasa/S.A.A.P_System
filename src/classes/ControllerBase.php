<?php

abstract class ControllerBasex
{
    protected $action;
    protected $request;

    public function __construct($action, $request)
    {
        $this->action = $action;
        $this->request = $request;
    }
    public function executeAction()
    {
        return $this->{$this->action}();
    }
    public function returnView($viewModel, $fullView)
    {
        $view = "src/views/".get_class($this)."/".$this->action.".php";
        if ($fullView == true) {
            require_once 'src/views/main.php';

        } else {
            require_once ($view);
        }
    }

    
}
