<!-- require all src folders -->

<?php
session_start();
//call all required files
require_once 'config.php';

//classes in the src file
require_once  'src/classes/ConnectorBase.php';
require_once  'src/classes/ControllerBase.php';
require_once  'src/classes/ModelBase.php';


//controllers in the src file
require_once  'src/controllers/home.php';
require_once  'src/controllers/user.php';

//model in the src file
require_once 'src/models/Home.php';
require_once 'src/models/UserModel.php';



//Declaring my connector objs

$connector_obj = new \ConnectorClassBase\ConnectorBase($_GET);

//set the connector obj to the validateController
$connector_obj = $connector_obj->validateController();


if($connector_obj){

    //execute the executionAction to return the action passeds

    $connector_obj->executeAction();
}


?>