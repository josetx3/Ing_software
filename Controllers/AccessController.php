<?php
require_once "Models/AccessModel.php";
require_once "Views/AccessView.php";

class AccessController
{
    function validateClient()
    {
        $AccesView = new AccessView();
        $AccesView->showFormSession();
    }

    function validateFormSession($array)
    {
        $Connection=new Connection('sel');
        $AccessModel=new AccessModel($Connection);
         
        $email=$array['email'];
        $password=$array['password'];


        $array_access=$AccessModel->validateFormSession($email,$password);

        if($array_access)
        {
            $_SESSION['acce_document']=$array_access[0]->acce_document;
            $_SESSION['auth']='OK';
            $_SESSION['acce_name1']=$array_access[0]->acce_name1;
            $_SESSION['acce_email']=$array_access[0]->acce_email;
            $_SESSION['emti_id']=$array_access[0]->emti_id;
        }
        header('Location: index.php');

    }

    function closeSession()
    {
        $response=array();
        
        session_unset();
        session_destroy();
        $_SESSION = array();
        $response['message']="Que tenga un buen día";
        exit(json_encode($response));
        
    }
}
