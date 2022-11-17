<?php
require_once "../private_files_ing_software/setting_connection.php";

class Connection
{
    private $link;
    private $result;
    
    function __construct($option)
    {
        $ip=IP;
        $data_base=DATA_BASE;
        
        if($option=='sel')
        {
            $user=USER_SEL;
            $password=PASSWORD_SEL;
        }
        else if($option=='all')
        {
            $user=USER_ALL;
            $password=PASSWORD_ALL;
        }
        else
        {
            exit('Falta la opciòn de conexiòn');
        }

        try
        {
            $connectionString = "pgsql:host=".$ip.";dbname=".$data_base.";";
            $this->link = new PDO($connectionString,$user,$password);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "CONEXION EXITOSA";

        }
        catch(PDOException $e)
        {
            exit($e->getMessage());
        }
    }

    function query($sql)
    {
        $this->result=$this->link->query($sql) or exit('Consulta mal estructurada');
    }

    function fetchAll()
    {
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }
}
