<?php
class PersonModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }
    // VALIDACIONESSS

    function consultDocument($document)
    {
        $sql = "SELECT * FROM access WHERE acce_document='$document'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultEmail($email)
    {
        $sql = "SELECT * FROM access WHERE acce_email='$email'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultTelephone($telephone)
    {
        $sql = "SELECT * FROM access WHERE acce_telephone_number='$telephone'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function listPerson()
    {
        $sql = "SELECT ac.*, et.* FROM access ac , employees_title et WHERE ac.emti_id=et.emti_id";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function selectPosition($emti_id)
    {
        $sql = "SELECT ac.*,et.* FROM access ac , employees_title et WHERE ac.acce_document='$emti_id' AND ac.emti_id=et.emti_id ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function selectPerson($document)
    {
        $sql = "SELECT * FROM access WHERE acce_document='$document'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function insertPerson($document, $name1, $name2, $lastname1, $lastname2, $address, $sex, $telephone, $email, $pasword, $emti_id, $acce_state)
    {
        $sql = "INSERT INTO access (acce_document, acce_name1, acce_name2, acce_lastname1, acce_lastname2, acce_address, acce_sex, acce_telephone_number, acce_email, acce_password, emti_id , acce_state)
        VALUES('$document', '$name1','$name2','$lastname1','$lastname2','$address','$sex','$telephone','$email','$pasword','$emti_id','$acce_state');";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //acce_document='$document',
    function updatePerson($document, $name1, $name2, $lastname1, $lastname2, $address, $telephone, $email, $pasword, $acce_state)
    {

        $sql = "UPDATE access SET 
        acce_name1 = '$name1',
        acce_name2 = '$name2',
        acce_lastname1= '$lastname1',
        acce_lastname2 = '$lastname2',
        acce_address= '$address',
        acce_telephone_number= '$telephone',
        acce_email = '$email',
        acce_password='$pasword',
        acce_state = '$acce_state'
        WHERE acce_document = '$document'
        ";
        $this->Connection->query($sql);
    }

    function consultPerson($search_person)
    {

        $sql = "SELECT ac.*, et.* FROM access ac , employees_title et WHERE ac.emti_id=et.emti_id 
                AND (acce_document = '$search_person' 
                OR acce_name1 = '$search_person' 
                OR acce_email = '$search_person')";
        /*
        $sql = "SELECT ac., et. FROM access ac , employees_title et WHERE ac.emti_id=et.emti_id 
                AND $filter = '$search_person'";
*/
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    // PARTE DE LAS VALIDACIONES AL ACTUALIZAR
    function updatePersonRepeatTelephone($telephone)
    {
        $sql = "SELECT * FROM access WHERE acce_telephone_number = '$telephone'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updatePersonRepeatEmail($email)
    {
        $sql = "SELECT * FROM access WHERE acce_email = '$email'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
