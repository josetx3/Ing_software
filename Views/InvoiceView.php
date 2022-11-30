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
                    <div class="row md-12 text-center">

                        <div class="form-group col-md-6">
                            <label for="">ID FACTURA</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">FECHA FACTURA</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="">CLIENTE</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">DOCUMENTO</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">TELEFONO</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="">NIT LOCAL</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="">LOCAL</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>

                    </div>

                    <br>
                    <hr><br>

                    <div class="row md-12">

                        <div class="form-group col-md-2">
                            <label for="">Codigo PLU</label>
                            <input type="text" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="">Descripcion</label>
                            <input type="text" class="form-control" name="" id="">
                        </div>

                        <div class="form-group col-md-1">
                            <label for="">Cantidad</label>
                            <input type="number" class="form-control" name="" id="" placeholder="" required>
                        </div>

                        <div class="form-group col-md-1">
                            <label for="">IMPUESTOS</label>
                            <input type="number" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-1">
                            <label for="">VALOR UNI</label>
                            <input type="number" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-1">
                            <label for="">VALOR TOTAL</label>
                            <input type="number" class="form-control" name="" id="" required>
                        </div>

                        <div class="form-group col-md-1 text-center">
                            <label for="">COMPRAR</label><br>
                            <h3><i class="bi bi-cart-plus text-warning"></i></h3>
                        </div>

                    </div>

                    <br>
                    <hr><br>
                    <div class="row md-12">

                        <div class="row col-md-9">
                            <p>a</p>
                        </div>

                        <div class="row col-md-1"></div>

                        <div class="row col-md-2 caja_1">

                            <div class="row md-12 color_1">
                                <div class="row text-justify">
                                    <div class="form-group col-md-4 caja_1">
                                        <label for="" class="">SUBTOTAL :</label>
                                        <input type="text" class="form-control" name="" id="" required>
                                    </div>
                                </div>

                                <div class="row text-justify">
                                    <div class="form-group col-md-4 caja_2">
                                        <label for="" class="">I.V.A :</label>
                                        <input type="text" class="form-control" name="" id="" required>
                                    </div>
                                </div>

                                <div class="row text-justify">
                                    <div class="form-group col-md-4 caja_3">
                                        <label for="" class="">TOTAL NETO :</label>
                                        <input type="text" class="form-control" name="" id="" required>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
            </div>

            </form>
        </div>
        </div>
<?php
    }
}
