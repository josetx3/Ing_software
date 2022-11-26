<?php
require_once "Models/PersonModel.php";
require_once "Views/PersonView.php";

class PersonController
{

    function paginatePerson()
    {
        require_once "Models/PositionModel.php";
        $Connection = new Connection('sel');
        $PersonModel = new PersonModel($Connection);
        $PositionModel = new PositionModel($Connection);
        $PersonView = new PersonView();
        $array_persons = $PersonModel->listPerson();
        $array_positions = $PositionModel->listPosition();
        $PersonView->paginatePerson($array_persons, $array_positions);
    }
    
    function insertPerson()
    {
        require_once "Models/PositionModel.php";
        $Connection = new Connection('sel');
        $PersonModel = new PersonModel($Connection);
        $PositionModel = new PositionModel($Connection);
        $PersonView = new PersonView();



        $document = strtolower($_POST['document']);
        $name1 = strtolower($_POST['name1']);
        $name2 = strtolower($_POST['name2']);
        $lastname1 = strtolower($_POST['lastname1']);
        $lastname2 = strtolower($_POST['lastname2']);
        $address = strtolower($_POST['address']);
        $sex = $_POST['sex'];
        $telephone = strtolower($_POST['telephone']);
        $email = $_POST['email'];
        $pasword = $_POST['pasword'];
        $pasword1 = $_POST['pasword1'];
        $emti_id = strtolower($_POST['emti_id']);
        $acce_state = strtoupper($_POST['acce_state']);

        if (empty($document)) {
            $response = ["message" => 'FALTA POR LLENAR EL DOCUMENTO'];
            exit(json_encode($response));
        }

        if (empty($name1)) {
            $response = ["message" => 'FALTA POR LLENAR EL NOMBRE 1'];
            exit(json_encode($response));
        }

        if (empty($lastname1)) {
            $response = ["message" => 'FALTA POR LLENAR EL APELLIDO 1'];
            exit(json_encode($response));
        }

        if (empty($address)) {
            $response = ["message" => 'FALTA POR LLENAR LA DIRECCION'];
            exit(json_encode($response));
        }

        if (empty($telephone)) {
            $response = ["message" => 'FALTA POR LLENAR EL TELEFONO'];
            exit(json_encode($response));
        }

        if (empty($email)) {
            $response = ["message" => 'FALTA POR LLENAR EL EMAIL'];
            exit(json_encode($response));
        }

        if (empty($pasword)) {
            $response = ["message" => 'FALTA POR LLENAR LA CONTRASEÑA'];
            exit(json_encode($response));
        }

        if (empty($acce_state)) {
            $response = ["message" => 'FALTA POR LLENAR EL ESTADO'];
            exit(json_encode($response));
        }

        if (strlen($name1) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES'];
            exit(json_encode($response));
        }

        if (strlen($name2) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES'];
            exit(json_encode($response));
        }

        if (strlen($lastname1) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES'];
            exit(json_encode($response));
        }

        if (strlen($lastname1) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES'];
            exit(json_encode($response));
        }

        if ($pasword1 != $pasword) {
            $response = ["message" => 'LAS CONTRASEÑAS NO COINCIDEN'];
            exit(json_encode($response));
        }

        $array_persons = $PersonModel->consultDocument($document);
        if ($array_persons) {
            $response = ["message" => 'DOCUMENTO YA REGISTRADO'];
            exit(json_encode($response));
        }

        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'EMAIL INVALIDO '];
            exit(json_encode($response));
        }

        $array_persons = $PersonModel->consultEmail($email);
        if ($array_persons) {
            $response = ["message" => 'EMAIL YA INGRESADO'];
            exit(json_encode($response));
        }

        $array_persons = $PersonModel->consultTelephone($telephone);
        if ($array_persons) {
            $response = ["message" => 'NUMERO YA REGISTRADO'];
            exit(json_encode($response));
        }


        $PersonModel->insertPerson($document, $name1, $name2, $lastname1, $lastname2, $address, $sex, $telephone, $email, $pasword, $emti_id, $acce_state);
        $array_persons = $PersonModel->listPerson();
        $array_positions = $PositionModel->listPosition();
        $PersonView->paginatePerson($array_persons, $array_positions);
    }

    function updatePerson()
    {
        require_once "Models/PositionModel.php";
        $Connection = new Connection('sel');
        $PersonModel = new PersonModel($Connection);
        $PositionModel = new PositionModel($Connection);
        $PersonView = new PersonView();

        $document = strtolower($_POST['id']);
        $name1 = strtolower($_POST['u_name1']);
        $name2 = strtolower($_POST['u_name2']);
        $lastname1 = strtolower($_POST['u_lastname1']);
        $lastname2 = strtolower($_POST['u_lastname2']);
        $address = strtolower($_POST['u_address']);
        $telephone = strtolower($_POST['u_telephone']);
        $telephone_1 = strtolower($_POST['u_telephone_1']);
        $email = $_POST['u_email'];
        $email_1 = $_POST['u_email_1'];
        $pasword = $_POST['u_pasword'];
        $acce_state = strtoupper($_POST['acce_state']);

        if (empty($document)) {
            $response = ["message" => 'FALTA POR LLENAR EL DOCUMENTO'];
            exit(json_encode($response));
        }

        if (empty($name1)) {
            $response = ["message" => 'FALTA POR LLENAR EL NOMBRE 1'];
            exit(json_encode($response));
        }

        if (empty($lastname1)) {
            $response = ["message" => 'FALTA POR LLENAR EL APELLIDO 1'];
            exit(json_encode($response));
        }

        if (empty($address)) {
            $response = ["message" => 'FALTA POR LLENAR LA DIRECCION'];
            exit(json_encode($response));
        }

        if (empty($telephone)) {
            $response = ["message" => 'FALTA POR LLENAR EL TELEFONO'];
            exit(json_encode($response));
        }

        if (empty($email)) {
            $response = ["message" => 'FALTA POR LLENAR EL EMAIL'];
            exit(json_encode($response));
        }

        if (empty($pasword)) {
            $response = ["message" => 'FALTA POR LLENAR LA CONTRASEÑA'];
            exit(json_encode($response));
        }

        if (empty($acce_state)) {
            $response = ["message" => 'FALTA POR LLENAR EL ESTADO'];
            exit(json_encode($response));
        }

        if (strlen($name1) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES'];
            exit(json_encode($response));
        }

        if (strlen($name2) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES'];
            exit(json_encode($response));
        }

        if (strlen($lastname1) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES'];
            exit(json_encode($response));
        }

        if (strlen($lastname2) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES'];
            exit(json_encode($response));
        }

        if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'EMAIL INVALIDO '];
            exit(json_encode($response));
        }

        if ($telephone != $telephone_1) {
            $array_persons = $PersonModel->updatePersonRepeatTelephone($telephone);
            if ((($array_persons))) {
                $response = ["message" => 'EL TELEFONO YA SE ENCUENTRA REGISTRADO'];
                exit(json_encode($response));
            }
        }

        if ($email != $email_1) {
            $array_persons = $PersonModel->updatePersonRepeatEmail($email);
            if ((($array_persons))) {
                $response = ["message" => 'EL EMAIL YA SE ENCUENTRA REGISTRADO'];
                exit(json_encode($response));
            }
        }




        //exit($document);
        $array_persons =  $PersonModel->updatePerson($document, $name1, $name2, $lastname1, $lastname2, $address, $telephone, $email, $pasword, $acce_state);
        $array_persons = $PersonModel->listPerson();
        $array_positions = $PositionModel->listPosition();
        $PersonView->paginatePerson($array_persons, $array_positions);
    }

    function showPerson()
    {
        require_once "Models/PositionModel.php";
        $Connection = new Connection('sel');
        $PersonModel = new PersonModel($Connection);
        $PositionModel = new PositionModel($Connection);
        $PersonView = new PersonView();
        $document = $_POST['id'];
        $array_persons = $PersonModel->selectPerson($document);
        $array_positions = $PositionModel->listPosition();
        $PersonView->showPerson($array_persons, $array_positions);
    }

    function consultPerson()
    {
        require_once "Models/PositionModel.php";
        $Connection = new Connection('sel');
        $PersonModel = new PersonModel($Connection);
        $PositionModel = new PositionModel($Connection);
        $PersonView = new PersonView();

        $search_person = $_POST['consulta_person'];
        //$filter = $_POST['filter_search'];

        if (empty($search_person)) {
            $response = ["message" => 'INGRESE UNA PALABRA CLAVE PARA BUSCAR'];
            exit(json_encode($response));
        }

        $arreglo_search_person = $PersonModel->consultPerson($search_person);
        //$arreglo_search_person = $PersonModel->consultPerson($filter,$search_person);
        $array_persons = $PersonModel->listPerson();

        $array_positions = $PositionModel->listPosition();


        if (!$arreglo_search_person) {
            $response = ["message" => 'EL USUARIO SOLICITADO NO SE ENCUENTRA REGISTRADO EN EL SISTEMA'];
            exit(json_encode($response));
        }
        $PersonView->paginatePerson($arreglo_search_person, $array_positions);
    }
}
