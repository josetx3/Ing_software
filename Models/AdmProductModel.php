<?php
class AdmProductModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }


    function listAdmProduct()
    {
        $sql = "SELECT * FROM audi_produc";
        //$sql = "SELECT * FROM audi_access";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}