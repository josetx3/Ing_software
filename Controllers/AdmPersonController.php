<?php
require_once "Models/AdmPersonModel.php";
require_once "Views/AdmPersonView.php";

class AdmPersonController
{

    function paginateAdmPerson()
    {
        require_once "Models/PositionModel.php";
        $Connection = new Connection('sel');
        $AdmPersonModel = new AdmPersonModel($Connection);
        $PositionModel = new PositionModel($Connection);
        $AdmPersonView = new AdmPersonView();
        $array_Admpersons = $AdmPersonModel->listAdmPerson();
        $array_positions = $PositionModel->listPosition();
        $AdmPersonView->paginateAdmPerson($array_Admpersons, $array_positions);
    }
}
