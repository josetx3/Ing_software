<?php
require_once "Models/PositionModel.php";
require_once "Views/PositionView.php";


class PositionController
{
    function paginatePosition()
    {
        $Connection = new Connection('sel');
        $PositionModel = new PositionModel($Connection);
        $PositionView = new PositionView();

        $array_positions = $PositionModel->listPosition();
        $PositionView->paginatePosition($array_positions);
    }

    function insertPosition()
    {
        $Connection = new Connection('sel');
        $PositionModel = new PositionModel($Connection);
        $PositionView = new PositionView();

        $emti_name = strtoupper($_POST['emti_name']);
        $emti_description = strtoupper($_POST['emti_description']);

        if (empty($emti_name)) {
            $response = ["message" => 'FALTA EL NOMBRE DEL CARGO'];
            exit(json_encode($response));
        }

        if (empty($emti_description)) {
            $response = ["message" => 'FALTA LA DESCRIPCION DEL CARGO'];
            exit(json_encode($response));
        }

        $array_positions = $PositionModel->consultEmtiName($emti_name);
        if ($array_positions) {
            $response = ["message" => 'CARGO YA REGISTRADO'];
            exit(json_encode($response));
        }


        $PositionModel->insertPosition($emti_name, $emti_description);
        $array_positions = $PositionModel->listPosition();
        $PositionView->paginatePosition($array_positions);
    }

    function updatePosition()
    {
        $Connection = new Connection('all');
        $PositionModel = new PositionModel($Connection);
        $PositionView = new PositionView();

        $emti_id = $_POST['id'];
        $emti_name = strtoupper($_POST['emti_name']);
        $emti_name_1 = strtoupper($_POST['emti_name_1']);
        $emti_description = strtoupper($_POST['emti_description']);


        if ($emti_name != $emti_name_1) {
            $array_positions = $PositionModel->consultEmtiName($emti_name);
            if ((($array_positions))) {
                $response = ["message" => 'YA ESTA REGISTRADO ESTE CARGO'];
                exit(json_encode($response));
            }
        }


        $PositionModel->updatePosition($emti_id, $emti_name, $emti_description);
        $array_positions = $PositionModel->listPosition();
        $PositionView->paginatePosition($array_positions);
    }

    function showPosition()
    {
        $Connection = new Connection('sel');
        $PositionModel = new PositionModel($Connection);
        $PositionView = new PositionView();

        $emti_id = $_POST['id'];
        $array_positions = $PositionModel->selectPosition($emti_id);
        $PositionView->showPosition($array_positions);
    }

    function consultPosition()
    {
        $Connection = new Connection('sel');
        $PositionModel = new PositionModel($Connection);
        $PositionView = new PositionView();


        $search_position = strtoupper($_POST['consult_position']);

        if (empty($search_position)) {
            $response = ["message" => 'SELECIONE UN FILRO DE BUSQUEDA O INGRESE UNA PALABRA CLAVE PARA BUSCAR'];
            exit(json_encode($response));
        }

        $arreglo_search_position = $PositionModel->consultposition($search_position);

        if (!$arreglo_search_position) {
            $response = ["message" => 'EL USUARIO SOLICITADO NO SE ENCUENTRA REGISTRADO O SELECCIONE OTRO FILTRO'];
            exit(json_encode($response));
        }
        $PositionView->paginatePosition($arreglo_search_position);
    }
}
