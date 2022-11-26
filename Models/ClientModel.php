<?php
class ClientModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listClient()
    {
        $sql = "SELECT * FROM public.cliente";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }


    //PARTE DE LAS VALIDACIONES AL INSERTAR ---- INICIO ----
    function consultDocumentClient($cliente_documento)
    {
        $sql = "SELECT * FROM cliente WHERE cliente_documento='$cliente_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultCorreoClient($cliente_correo)
    {
        $sql = "SELECT * FROM cliente WHERE cliente_correo='$cliente_correo'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultTelefonoClient($cliente_telefono)
    {
        $sql = "SELECT * FROM cliente WHERE cliente_telefono='$cliente_telefono'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultNitNegocioClient($cliente_nit_negocio)
    {
        $sql = "SELECT * FROM cliente WHERE cliente_nit_negocio='$cliente_nit_negocio'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
    //PARTE DE LAS VALIDACIONES AL INSERTAR ---- FIN ----

    function insertClient($cliente_documento, $cliente_nombre, $cliente_correo, $cliente_sexo, $cliente_telefono, $cliente_direccion, $cliente_barrio, $cliente_nombre_negocio, $cliente_nit_negocio, $cliente_estado)
    {
        $sql = "INSERT INTO cliente (cliente_documento,cliente_nombre,cliente_correo,cliente_sexo,cliente_telefono,cliente_direccion,cliente_barrio,cliente_nombre_negocio,cliente_nit_negocio,cliente_estado) 
                            VALUES ('$cliente_documento','$cliente_nombre','$cliente_correo','$cliente_sexo','$cliente_telefono','$cliente_direccion','$cliente_barrio','$cliente_nombre_negocio','$cliente_nit_negocio','$cliente_estado');";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function selectClient($cliente_documento)
    {
        $sql = "SELECT * FROM cliente WHERE cliente_documento = '$cliente_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateClient($cliente_documento, $cliente_nombre, $cliente_correo, $cliente_sexo, $cliente_telefono, $cliente_direccion, $cliente_barrio, $cliente_nombre_negocio, $cliente_nit_negocio, $cliente_estado)
    {
        $sql = "UPDATE cliente SET
     cliente_nombre = '$cliente_nombre',
     cliente_correo = '$cliente_correo',
     cliente_sexo = '$cliente_sexo',
     cliente_telefono = '$cliente_telefono',
     cliente_direccion = '$cliente_direccion',
     cliente_barrio = '$cliente_barrio',
     cliente_nombre_negocio = '$cliente_nombre_negocio',
     cliente_nit_negocio = '$cliente_nit_negocio',
     cliente_estado = '$cliente_estado'
     WHERE cliente_documento = '$cliente_documento'
     ";
        $this->Connection->query($sql);
    }

    // PARTE DE VALIDACIONES DE ACTUALIZAR ---- INICIO ----

    function updateDocumentClientRepeat($cliente_documento)
    {
        $sql = "SELECT * FROM cliente WHERE cliente_documento = '$cliente_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateCorreoClientRepeat($cliente_correo)
    {
        $sql = "SELECT * FROM cliente WHERE cliente_correo = '$cliente_correo'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateTelefonoClientRepeat($cliente_telefono)
    {
        $sql = "SELECT * FROM cliente WHERE cliente_telefono = '$cliente_telefono'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateNitNegocioClientRepeat($cliente_nit_negocio)
    {
        $sql = "SELECT * FROM cliente WHERE cliente = '$cliente_nit_negocio'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    // PARTE DE VALIDACIONES DE ACTUALIZAR ---- FIN ----

    function consultClient($search_client)
    {
        $sql = "SELECT * FROM cliente WHERE cliente_documento ='$search_client' OR
                                            cliente_nombre='$search_client' OR
                                            cliente_correo = '$search_client' OR
                                            cliente_telefono = '$search_client' OR
                                            cliente_nombre_negocio = '$search_client' OR
                                            cliente_nit_negocio = '$search_client'
                                            ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
