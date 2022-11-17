<?php
class AdmPersonModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }


    function listAdmPerson()
    {
        $sql = "SELECT auac.*, et.* FROM audi_access auac , employees_title et WHERE ac.emti_id=et.emti_id";
        $sql = "SELECT * FROM audi_access";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}