<?php
class InvoiceView
{

    function paginateInvoice($array_invoice)
    {
?>
        <div class="cord">
            <div class="card-header text-center bg-info text-black">
                Registrar una factura
            </div>
            <br>
            <div class="card-body">
                <form id="insert-invoice">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="">ID Factura</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">PRODUCTOS</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">PRECIO UNITARIO</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>

                    </div>
                </form>
            </div>
        </div>
<?php
    }
}
