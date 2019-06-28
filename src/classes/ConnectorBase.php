<?php
// Connects all the pages in the project

namespace ConnectorClassBase;
class ConnectorBase 
{

    //declaring private variables for navigation
    
    private $_controller;
    private $_action;
    private $_request;


    //constructor that takes in the request

    //create a constructor class that takes a request
     public function __construct($_request)
     {
         $this->request = $_request;
         //check the url for controllers
         if ($this->request['controller'] == "") {
             $this->controller = "home"; //default start page
         } else {
             $this->controller = $this->request['controller']; //return-load the controller in the url
         }
         //check the url for actions
         if ($this->request['action'] == "") {
             $this->action = "index"; //default start page
         } else {
             $this->action = $this->request['action']; //return-load the action in the url
         }
        }

      //create a function to check if controller class exists
    
      public function validateController()
    {
        if (class_exists($this->controller)) {
            //get the parent-root class of the controller
            $parent_rootClass = class_parents($this->controller);
            //check if the base controller exists
            if (in_array("ControllerBasex", $parent_rootClass)) {
                //check if action exists
                if (method_exists($this->controller, $this->action)) {
                    //pass teo parameters to the controller[action,request]
                    //instantiate the controller
                    return new $this->controller($this->action, $this->request);

                } else {
                    echo 'Method/Action of this Controller was not Found!.';
                    return;
                }
                

            } else {
                echo 'Base Class of this Controller was not Found!.';
                return;
            }
            

        } else {
           
            echo 'Controller Class not found';
            return;
        }
        

    }
   
     
 }


