<?php
require_once "Config/session.php";
require_once "Config/Connection.php";

if(isset($_SESSION,$_SESSION['acce_document']) and $_SESSION['auth']=='OK')
{
    require_once "Config/FrontController.php";
    
    if(isset($_GET['route']))
    {
        $route=$_GET['route'];
    }
    else
    {
        $route='';
    }
    
    $FrontController=new FrontController($route);
}
else if(isset($_POST['email'],$_POST['password']))
{
    require_once "Controllers/AccessController.php";
    $AccessController=new AccessController();
    $AccessController->validateFormSession($_POST);   
}
else
{
    require_once "Controllers/AccessController.php";
    $AccessController=new AccessController();
    $AccessController->validateClient(); 
}
?>