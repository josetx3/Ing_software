<?php
require_once "Models/AdmProductModel.php";
require_once "Views/AdmProductView.php";

class AdmProductController
{
    function paginateAdmProduct()
    {
        $Connection = new Connection('sel');
        $AdmProductModel = new AdmProductModel($Connection);
        $AdmProductView = new AdmProductView();

        $array_Admproducts = $AdmProductModel->listAdmProduct();
        $AdmProductView->paginateAdmProduct($array_Admproducts);
    }
}