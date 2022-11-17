<?php
require_once "Models/InvoiceModel.php";
require_once "Views/InvoiceView.php";

class InvoiceController
{
    function paginateInvoice()
    {
        $Connection = new Connection('sel');
        $InvoiceModel = new InvoiceModel($Connection);
        $InvoiceView = new InvoiceView();

        $array_invoice = $InvoiceModel->listInvoice();
        $InvoiceView->paginateInvoice($array_invoice);
    }
}