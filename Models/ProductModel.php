<?php

class ProductModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listProduct()
    {
        $sql = "SELECT * FROM produc";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultDescrip($prod_description)
    {
        $sql = "SELECT * FROM produc WHERE prod_description='$prod_description'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultCodigoPlu($prod_code_plu)
    {
        $sql = "SELECT * FROM produc WHERE prod_code_plu='$prod_code_plu'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consult_prod_code_plu($prod_code_plu)
    {
        $sql = "SELECT * FROM produc WHERE prod_code_plu = '$prod_code_plu'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function insertProduct($prod_reference, $prod_code_plu, $prod_description, $prod_available_quantity, $prod_arrival_price, $prod_selling_price, $prod_iva)
    {
        $sql = "INSERT INTO produc (prod_reference,prod_code_plu,prod_description,prod_available_quantity,prod_arrival_price,prod_selling_price,prod_iva)
        VALUES                      ('$prod_reference','$prod_code_plu','$prod_description',$prod_available_quantity,$prod_arrival_price,$prod_selling_price,'$prod_iva');";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateProduct($prod_reference, $prod_code_plu, $prod_description, $prod_available_quantity, $prod_arrival_price, $prod_selling_price, $prod_iva)
    {
        $sql = "UPDATE produc SET
                prod_description = '$prod_description',
                prod_available_quantity = '$prod_available_quantity',
                prod_arrival_price = '$prod_arrival_price',
                prod_selling_price = '$prod_selling_price',
                prod_iva = '$prod_iva'
                WHERE prod_code_plu = '$prod_code_plu' AND
                prod_reference = '$prod_reference'
                ";
        $this->Connection->query($sql);
    }

    function selectProduct($prod_code_plu)
    {
        $sql = "SELECT * FROM produc WHERE prod_code_plu='$prod_code_plu' ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultProduct($search_product)
    {
        $sql = "SELECT * FROM produc WHERE prod_code_plu = '$search_product' OR prod_description LIKE '%$search_product%'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateProductRepeat($prod_description)
    {
        $sql = "SELECT * FROM produc WHERE prod_description = '$prod_description'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
    
    function validateUpdateProduct($prod_code_plu,$prod_reference)
    {
        $sql = "SELECT * FROM produc WHERE prod_code_plu ='$prod_code_plu' AND Prod_reference = '$prod_reference'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
