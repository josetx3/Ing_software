<?php

require_once "Models/ClientModel.php";
require_once "Views/ClientView.php";

class ClientController
{

    function paginateClient()
    {
        $Connection = new Connection('sel');
        $ClientModel = new ClientModel($Connection);
        $ClientView = new ClientView();

        $array_clients = $ClientModel->listClient();
        $ClientView->paginateClient($array_clients);
    }

    function insertClient()
    {
        $Connection = new Connection('sel');
        $ClientModel = new ClientModel($Connection);
        $ClientView = new ClientView();

        $cliente_documento = $_POST['cliente_documento'];
        $cliente_nombre = $_POST['cliente_nombre'];
        $cliente_correo = $_POST['cliente_correo'];
        $cliente_sexo = $_POST['cliente_sexo'];
        $cliente_telefono = $_POST['cliente_telefono'];
        $cliente_direccion = $_POST['cliente_direccion'];
        $cliente_barrio = $_POST['cliente_barrio'];
        $cliente_nombre_negocio = $_POST['cliente_nombre_negocio'];
        $cliente_nit_negocio = $_POST['cliente_nit_negocio'];
        $cliente_estado = $_POST['cliente_estado'];

        if (empty($cliente_documento)) {
            $response = ["message" => 'FALTA POR LLENAR EL DOCUMENTO'];
            exit(json_encode($response));
        }

        if (empty($cliente_nombre)) {
            $response = ["message" => 'FALTA POR LLENAR EL NOMBRE'];
            exit(json_encode($response));
        }

        if (empty($cliente_correo)) {
            $response = ["message" => 'FALTA POR LLENAR EL CORREO'];
            exit(json_encode($response));
        }

        if (empty($cliente_sexo)) {
            $response = ["message" => 'FALTA POR LLENAR EL SEXO'];
            exit(json_encode($response));
        }

        if (empty($cliente_telefono)) {
            $response = ["message" => 'FALTA POR LLENAR EL TELEFONO'];
            exit(json_encode($response));
        }

        if (empty($cliente_direccion)) {
            $response = ["message" => 'FALTA POR LLENAR LA DIRECCION'];
            exit(json_encode($response));
        }

        if (empty($cliente_barrio)) {
            $response = ["message" => 'FALTA POR LLENAR EL BARRIO'];
            exit(json_encode($response));
        }

        if (empty($cliente_nombre_negocio)) {
            $response = ["message" => 'FALTA POR LLENAR EL NOMBRE DEL NEGOCIO'];
            exit(json_encode($response));
        }

        if (empty($cliente_nit_negocio)) {
            $response = ["message" => 'FALTA POR LLENAR EL NIT DEL NEGOCIO'];
            exit(json_encode($response));
        }

        if (empty($cliente_estado)) {
            $response = ["message" => 'FALTA POR LLENAR EL ESTADO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_documento) > 80) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 80 CARACTERES EN EL NOMBRE'];
            exit(json_encode($response));
        }

        if (strlen($cliente_correo) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES EN EL CORREO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_telefono) > 20) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 20 CARACTERES EN EL TELEFONO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_direccion) > 40) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 40 CARACTERES EN LA DIRECCION'];
            exit(json_encode($response));
        }

        if (strlen($cliente_barrio) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES EN EL BARRIO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_nombre_negocio) > 50) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 50 CARACTERES EN EL NOMBRE DEL NEGOCIO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_nit_negocio) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES EN EL NIT DEL NEGOCIO'];
            exit(json_encode($response));
        }

        $array_clients = $ClientModel->consultDocumentClient($cliente_documento);
        if ($array_clients) {
            $response = ["message" => 'DOCUMENTO YA REGISTRADO'];
            exit(json_encode($response));
        }

        if ($cliente_nit_negocio < 0) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR VALORES NEGATIVOS'];
            exit(json_encode($response));
        }

        if ($cliente_telefono < 0) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR VALORES NEGATIVOS'];
            exit(json_encode($response));
        }

        if (!(filter_var($cliente_correo, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'EMAIL INVALIDO '];
            exit(json_encode($response));
        }

        $array_clients = $ClientModel->consultCorreoClient($cliente_correo);
        if ($array_clients) {
            $response = ["message" => 'EMAIL YA REGISTRADO'];
            exit(json_encode($response));
        }

        $array_clients = $ClientModel->consultTelefonoClient($cliente_telefono);
        if ($array_clients) {
            $response = ["message" => 'NUMERO YA REGISTRADO'];
            exit(json_encode($response));
        }

        $array_clients = $ClientModel->consultNitNegocioClient($cliente_nit_negocio);
        if ($array_clients) {
            $response = ["message" => 'NIT YA REGISTRADO'];
            exit(json_encode($response));
        }

        $ClientModel->insertClient($cliente_documento, $cliente_nombre, $cliente_correo, $cliente_sexo, $cliente_telefono, $cliente_direccion, $cliente_barrio, $cliente_nombre_negocio, $cliente_nit_negocio, $cliente_estado);
        $array_clients = $ClientModel->listClient();
        $ClientView->paginateClient($array_clients);
    }

    function showClient()
    {
        $Connection = new Connection('sel');
        $ClientModel = new ClientModel($Connection);
        $ClientView = new ClientView();
        $cliente_documento = $_POST['id'];
        $array_clients = $ClientModel->selectClient($cliente_documento);
        $ClientView->showClient($array_clients);
    }

    function updateClient()
    {
        $Connection = new Connection('sel');
        $ClientModel = new ClientModel($Connection);
        $ClientView = new ClientView();

        $cliente_documento = $_POST['cliente_documento'];
        $cliente_documento1 = $_POST['cliente_documento1'];
        $cliente_nombre = $_POST['cliente_nombre'];
        $cliente_correo = $_POST['cliente_correo'];
        $cliente_correo1 = $_POST['cliente_correo1'];
        $cliente_sexo = $_POST['cliente_sexo'];
        $cliente_telefono = $_POST['cliente_telefono'];
        $cliente_telefono1 = $_POST['cliente_telefono1'];
        $cliente_direccion = $_POST['cliente_direccion'];
        $cliente_barrio = $_POST['cliente_barrio'];
        $cliente_nombre_negocio = $_POST['cliente_nombre_negocio'];
        $cliente_nit_negocio = $_POST['cliente_nit_negocio'];
        $cliente_nit_negocio1 = $_POST['cliente_nit_negocio1'];
        $cliente_estado = $_POST['cliente_estado'];

        if (empty($cliente_documento)) {
            $response = ["message" => 'FALTA EL DOCUMENTO'];
            exit(json_encode($response));
        }

        if (empty($cliente_nombre)) {
            $response = ["message" => 'FALTA EL NOMBRE'];
            exit(json_encode($response));
        }

        if (empty($cliente_correo)) {
            $response = ["message" => 'FALTA EL CORREO'];
            exit(json_encode($response));
        }

        if (empty($cliente_sexo)) {
            $response = ["message" => 'FALTA EL SEXO'];
            exit(json_encode($response));
        }

        if (empty($cliente_telefono)) {
            $response = ["message" => 'FALTA EL TELEFONO'];
            exit(json_encode($response));
        }

        if (empty($cliente_direccion)) {
            $response = ["message" => 'FALTA LA DIRECCION'];
            exit(json_encode($response));
        }

        if (empty($cliente_barrio)) {
            $response = ["message" => 'FALTA EL BARRIO'];
            exit(json_encode($response));
        }

        if (empty($cliente_nombre_negocio)) {
            $response = ["message" => 'FALTA EL NOMBRE DEL NEGOCIO'];
            exit(json_encode($response));
        }

        if (empty($cliente_nit_negocio)) {
            $response = ["message" => 'FALTA EL NIT DEL NEGOCIO'];
            exit(json_encode($response));
        }

        if (empty($cliente_estado)) {
            $response = ["message" => 'FALTA EL ESTADO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_documento) > 80) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 80 CARACTERES EN EL NOMBRE'];
            exit(json_encode($response));
        }

        if (strlen($cliente_correo) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES EN EL CORREO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_telefono) > 20) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 20 CARACTERES EN EL TELEFONO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_direccion) > 40) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 40 CARACTERES EN LA DIRECCION'];
            exit(json_encode($response));
        }

        if (strlen($cliente_barrio) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES EN EL BARRIO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_nombre_negocio) > 50) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 50 CARACTERES EN EL NOMBRE DEL NEGOCIO'];
            exit(json_encode($response));
        }

        if (strlen($cliente_nit_negocio) > 30) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 30 CARACTERES EN EL NIT DEL NEGOCIO'];
            exit(json_encode($response));
        }

        if (!(filter_var($cliente_correo, FILTER_VALIDATE_EMAIL))) {
            $response = ["message" => 'EMAIL INVALIDO '];
            exit(json_encode($response));
        }

        if ($cliente_documento != $cliente_documento1) {
            $array_clients = $ClientModel->updateDocumentClientRepeat($cliente_documento);
            if ((($array_clients))) {
                $response = ["message" => 'DOCUMENTO YA REGISTRADO'];
                exit(json_encode($response));
            }
        }

        if ($cliente_correo != $cliente_correo1) {
            $array_clients = $ClientModel->updateCorreoClientRepeat($cliente_correo);
            if ($array_clients) {
                $response = ["message" => 'EMAIL YA REGISTRADO'];
                exit(json_encode($response));
            }
        }

        if ($cliente_telefono != $cliente_telefono1) {
            $array_clients = $ClientModel->updateTelefonoClientRepeat($cliente_telefono);
            if ($array_clients) {
                $response = ["message" => 'NUMERO YA REGISTRADO'];
                exit(json_encode($response));
            }
        }

        if ($cliente_nit_negocio != $cliente_nit_negocio1) {
            $array_clients = $ClientModel->updateNitNegocioClientRepeat($cliente_nit_negocio);
            if ($array_clients) {
                $response = ["message" => 'NIT YA REGISTRADO'];
                exit(json_encode($response));
            }
        }


        $array_clients = $ClientModel->updateClient($cliente_documento, $cliente_nombre, $cliente_correo, $cliente_sexo, $cliente_telefono, $cliente_direccion, $cliente_barrio, $cliente_nombre_negocio, $cliente_nit_negocio, $cliente_estado);
        $array_clients = $ClientModel->listClient();
        $ClientView->paginateClient($array_clients);
    }

    function consultClient()
    {
        $Connection = new Connection('sel');
        $ClientModel = new ClientModel($Connection);
        $ClientView = new ClientView();

        $search_client = $_POST['consult_client'];
        if (empty($search_client)) {
            $response = ["message" => 'INGRESE UNA PALABRA CLAVE PARA BUSCAR'];
            exit(json_encode($response));
        }
        $array_search_client = $ClientModel->consultClient($search_client);
        $array_clients = $ClientModel->listClient();
        if (!$array_search_client) {
            $response = ["message" => 'EL CLIENTE SOLICITADO NO SE ENCUENTRA REGISTRADO EN EL SISTEMA O INGRESO MAL LOS VALORES DE BUSQUEDA'];
            exit(json_encode($response));
        }
        $ClientView->paginateClient($array_search_client);
    }
}
