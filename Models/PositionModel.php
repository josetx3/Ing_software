<?php

class PositionModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listPosition()
    {
        $sql = "SELECT * FROM employees_title";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function insertPosition($emti_name, $emti_description)
    {
        $sql = "INSERT INTO employees_title (emti_name, emti_description)
                    VALUES ('$emti_name','$emti_description')";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function selectPosition($emti_id)
    {
        $sql = "SELECT * FROM employees_title WHERE emti_id=$emti_id";

        $this->Connection->query($sql);

        return $this->Connection->fetchAll();
    }

    function updatePosition($emti_id, $emti_name, $emti_description)
    {
        $sql = "UPDATE employees_title SET
        emti_name='$emti_name',
        emti_description='$emti_description'
        WHERE emti_id='$emti_id' ";
        $this->Connection->query($sql);
    }

    function consultposition($search_position)
    {
        $sql = "SELECT * FROM employees_title WHERE emti_name = '$search_position'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    // PARTE DE LAS VALIDACIONES

    function consultEmtiName($emti_name)
    {
        $sql = "SELECT * FROM employees_title WHERE emti_name='$emti_name' ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

}
