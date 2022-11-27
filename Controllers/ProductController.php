<?php
require_once "Models/ProductModel.php";
require_once "Views/ProducView.php";

class ProductController
{
    function paginateProduct()
    {
        $Connection = new Connection('sel');
        $ProductModel = new ProductModel($Connection);
        $ProductView = new ProductView();

        $array_products = $ProductModel->listProduct();
        $ProductView->paginateProduct($array_products);
    }

    function insertProduct()
    {
        $Connection = new Connection('sel');
        $ProductModel = new ProductModel($Connection);
        $ProductView = new ProductView();

        $prod_reference = strtoupper($_POST['prod_reference']);
        $prod_code_plu = strtoupper($_POST['prod_code_plu']);
        $prod_description = strtoupper($_POST['prod_description']);
        $prod_available_quantity = strval($_POST["prod_available_quantity"]);
        $prod_arrival_price = strval(floatval($_POST['prod_arrival_price']));
        $prod_selling_price = strval(floatval($_POST['prod_selling_price']));
        $prod_iva  = floatval(strval($_POST['prod_iva']));

        if ($prod_available_quantity <= 0) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR UN VALOR NEGATIVO O IGUAL A 0'];
            exit(json_encode($response));
        }
        if($prod_iva < 0){
            $response = ["message" => 'NO SE ACEPTAN VALORES NEGATIVOS'];
            exit(json_encode($response));
        }

        if (empty($prod_reference)) {
            $response = ["message" => 'FALTAN EL CAMPO DE LA REFERENCIA'];
            exit(json_encode($response));
        }

        if (empty($prod_code_plu)) {
            $response = ["message" => 'FALTAN EL CAMPO DE CODIGO PLU'];
            exit(json_encode($response));
        }

        if (empty($prod_description)) {
            $response = ["message" => 'FALTAN EL CAMPO DE LA DESCRIPCION'];
            exit(json_encode($response));
        }

        if (empty($prod_available_quantity)) {
            $response = ["message" => 'FALTAN EL CAMPO DE LA CANTIDAD'];
            exit(json_encode($response));
        }

        if (empty($prod_arrival_price)) {
            $response = ["message" => 'FALTAN EL CAMPO DE PRECIO COMPRA'];
            exit(json_encode($response));
        }

        if (empty($prod_selling_price)) {
            $response = ["message" => 'FALTAN EL CAMPO DE PRECIO VENTA'];
            exit(json_encode($response));
        }

        if (empty($prod_iva)) {
            $response = ["message" => 'FALTAN EL CAMPO DEL IVA'];
            exit(json_encode($response));
        }

        $array_products = $ProductModel->consult_prod_code_plu($prod_code_plu);
        if ($array_products) {
            $response = ["message" => 'CODIGO YA REGISTRADO'];
            exit(json_encode($response));
        }

        if ($prod_arrival_price <= 0) {
            $response = ["message" => 'EL PRECIO DE COMPRA DEBE TENER UN VALOR MAYOR A 0'];
            exit(json_encode($response));
        }

        if ($prod_selling_price <= 0) {
            $response = ["message" => 'EL PRECIO DE VENTA DEBE TENER UN VALOR MAYOR A 0'];
            exit(json_encode($response));
        }

        $ProductModel->insertProduct($prod_reference, $prod_code_plu, $prod_description, $prod_available_quantity, $prod_arrival_price, $prod_selling_price, $prod_iva);
        $array_products = $ProductModel->listProduct();
        $ProductView->paginateProduct($array_products);
    }

    function updateProduct()
    {
        $Connection = new Connection('sel');
        $ProductModel = new ProductModel($Connection);
        $ProductView = new ProductView();

        $prod_code_plu = strtoupper($_POST['u_prod_code_plu']);
        $prod_reference = $_POST['u_prod_reference'];
        $prod_description = strtoupper($_POST['u_prod_description']);
        $prod_description_1 = strtoupper($_POST['u_prod_description_1']);
        $prod_available_quantity = strval($_POST["u_prod_available_quantity"]);
        $prod_arrival_price = strval(floatval($_POST['u_prod_arrival_price']));
        $prod_selling_price = strval(floatval($_POST['u_prod_selling_price']));
        $prod_iva  = floatval(strval($_POST['u_prod_iva']));

        if (empty($prod_code_plu)) {
            $response = ["message" => 'FALTAN EL CAMPO DE CODIGO PLU'];
            exit(json_encode($response));
        }

        if (empty($prod_reference)) {
            $response = ["message" => 'FALTAN EL CAMPO DE LA REFERENCIA'];
            exit(json_encode($response));
        }


        if (empty($prod_description)) {
            $response = ["message" => 'FALTAN EL CAMPO DE LA DESCRIPCION'];
            exit(json_encode($response));
        }


        if (empty($prod_available_quantity)) {
            $response = ["message" => 'FALTAN EL CAMPO DE LA CANTIDAD'];
            exit(json_encode($response));
        }


        if (empty($prod_arrival_price)) {
            $response = ["message" => 'FALTAN EL CAMPO DE PRECIO COMPRA'];
            exit(json_encode($response));
        }


        if (empty($prod_selling_price)) {
            $response = ["message" => 'FALTAN EL CAMPO DE PRECIO VENTA'];
            exit(json_encode($response));
        }

        if ($prod_description != $prod_description_1) {

            $array_products  = $ProductModel->updateProductRepeat($prod_description);
            if ((($array_products))) {
                $response = ["message" => 'EL PRODUCTO YA SE ENCUENTRA REGISTRADO'];
                exit(json_encode($response));
            }
        }

        $array_products = $ProductModel->validateUpdateProduct($prod_code_plu, $prod_reference);
        if (!$array_products) {
            $response = ["message" => 'SE ALTERO EL CODIGO DEL PRODUCTO'];
            exit(json_encode($response));
        }

        if($prod_iva < 0){
            $response = ["message" => 'NO SE PUEDEN INGRESAR VALORES NEGATIVOS'];
            exit(json_encode($response));
        }

        if ($prod_available_quantity <= 0) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR UNA CANTIDAD IGUAL A 0 O MENOR QUE 0'];
            exit(json_encode($response));
        }

        if (strlen($prod_description) > 200) {
            $response = ["message" => 'NO SE PUEDEN INGRESAR MAS DE 200 CARACTERES'];
            exit(json_encode($response));
        }

        $array_products = $ProductModel->updateProduct($prod_reference, $prod_code_plu, $prod_description, $prod_available_quantity, $prod_arrival_price, $prod_selling_price, $prod_iva);
        $array_products = $ProductModel->listProduct();
        $ProductView->paginateProduct($array_products);
    }

    function showProduct()
    {
        $Connection = new Connection('sel');
        $ProductModel = new ProductModel($Connection);
        $ProductView = new ProductView();
        $prod_code_plu = $_POST['id'];
        $array_products = $ProductModel->selectProduct($prod_code_plu);
        $ProductView->showProduct($array_products);
    }



    function consultProduct()
    {
        $Connection = new Connection('sel');
        $ProductModel = new ProductModel($Connection);
        $ProductView = new ProductView();

        $search_product = strtoupper($_POST['consulta_producto']);

        if (empty($search_product)) {
            $response = ["message" => 'INGRESE UN CODIGO PARA REALIZAR LA BUSQUEDA'];
            exit(json_encode($response));
        }

        $arreglo_search_product = $ProductModel->consultProduct($search_product);

        if (!$arreglo_search_product) {
            $response = ["message" => 'EL PRODUCTO NO SE ENCUENTRA REGISTRADO'];
            exit(json_encode($response));
        }
        $ProductView->paginateProduct($arreglo_search_product);
    }
}
