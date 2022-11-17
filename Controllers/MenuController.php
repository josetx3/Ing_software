<?php
require_once "Views/MenuView.php";

class MenuController
{
    function validateMenu()
    {
        $MenuView = new MenuView();
        
        $MenuView->showMenu();
    }
}

?>