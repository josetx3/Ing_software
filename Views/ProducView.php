<?php

class ProductView
{
    function paginateProduct($array_products)
    {
?>
        <div class="card">
            <div class="card-header text-center bg-info text-black">
                Registrar Producto
            </div>
            <br>
            <div class="card-body">
                <form id="insert_product">

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">Referencia:</label>
                            <input type="text" class="form-control" name="prod_reference" id="prod_reference" onkeypress="return solonumeros(event)" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Codigo PLU:</label>
                            <input type="text" class="form-control" name="prod_code_plu" id="prod_code_plu" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Descripcion:</label>
                            <input type="text" class="form-control" name="prod_description" id="prod_description">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Cantidad:</label>
                            <input type="number" class="form-control" name="prod_available_quantity" id="prod_available_quantity" placeholder="No se aceptan valores de 0 o menos" onkeypress="return solonumeros(event)" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Precio compra:</label>
                            <input type="number" class="form-control" name="prod_arrival_price" id="prod_arrival_price" onkeypress="return solonumeros(event)">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Precio venta:</label>
                            <input type="number" class="form-control" name="prod_selling_price" id="prod_selling_price" onkeypress="return solonumeros(event)" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Iva:</label>
                            <input type="number" class="form-control" name="prod_iva" id="prod_iva" value="1.19" required>
                        </div>

                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary float-right" onclick="Product.insertProduct()">
                                <i class="bi bi-cloud-upload"> Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header bg-info text-black text-center">
                Listar Productos
            </div>

            <div class="card-body">
                <br>
                <div class="search-bar">
                    <form id="form_consulta_product" class="search-form align-items-center" method="POST" action="#">
                        <div class="row mb-10">
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="consulta_producto" id="consulta_producto" placeholder="Busqueda por codigo" title="Enter search keyword">
                            </div>
                            <div class="col-md-1">
                                <button class="form-control " type="button" title="Consulta por codigo"><i class="bi bi-search" onclick="Product.consultProduct()"></i></button>
                            </div>
                            <div class="col-md-1">
                                <button class="form-control " type="button" title="Recargar"><i class="bi bi-arrow-counterclockwise" onclick="Menu.menu('ProductController/paginateProduct')"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class=" text-center">
                                <th>REFERENCIA</th>
                                <th>CODIGO</th>
                                <th>DESCRIPCION</th>
                                <th>CANTIDAD DISPONIBLE</th>
                                <th>PRECIO COMPRA</th>
                                <th>PRECIO VENTA </th>
                                <th>IVA</th>
                                <th style="text-align:center;">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_products as $object_product) {
                                $prod_reference = $object_product->prod_reference;
                                $prod_code_plu = $object_product->prod_code_plu;
                                $prod_description = $object_product->prod_description;
                                $prod_available_quantity = $object_product->prod_available_quantity;
                                $prod_arrival_price = $object_product->prod_arrival_price;
                                $prod_selling_price = $object_product->prod_selling_price;
                                $prod_iva = $object_product->prod_iva;
                            ?>
                                <tr class="text-center">
                                    <td> <?= $prod_reference; ?> </td>
                                    <td> <?= $prod_code_plu; ?> </td>
                                    <td> <?= $prod_description; ?> </td>
                                    <td> <?= $prod_available_quantity; ?> </td>
                                    <td> $<?= $prod_arrival_price; ?> </td>
                                    <td> $<?= $prod_selling_price; ?> </td>
                                    <td> <?= $prod_iva; ?> </td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Product.showProduct('<?= $prod_code_plu ?>')"></i>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





    <?php
    } // <----- paginateProduct($array_products)---->
    function showProduct($array_products)
    {
        $prod_reference = $array_products[0]->prod_reference;
        $prod_code_plu = $array_products[0]->prod_code_plu;
        $prod_description = $array_products[0]->prod_description;
        $prod_available_quantity = $array_products[0]->prod_available_quantity;
        $prod_arrival_price = $array_products[0]->prod_arrival_price;
        $prod_selling_price = $array_products[0]->prod_selling_price;
        $prod_iva = $array_products[0]->prod_iva;

    ?>

        <div class="card">
            <div class="card-body">
                <form id="update_product">

                    <div class="row">

                    <div class="form-group col-md-6">
                            <label for="">Referencia:</label>
                            <input type="text" class="form-control" name="u_prod_reference" id="u_prod_reference" value="<?= $prod_reference ?>" onkeypress="return solonumeros(event);" readOnly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Codigo PLU:</label>
                            <input type="text" class="form-control" name="u_prod_code_plu" id="u_prod_code_plu" value="<?= $prod_code_plu ?>" readOnly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Descripcion:</label>
                            <input type="text" class="form-control" name="u_prod_description" id="u_prod_description" value="<?= $prod_description ?>">
                            <input type="hidden"  name="u_prod_description_1" id="u_prod_description_1" value="<?= $prod_description ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Cantidad:</label>
                            <input type="number" class="form-control" name="u_prod_available_quantity" id="u_prod_available_quantity" value="<?= $prod_available_quantity ?>" onkeypress="return solonumeros(event);">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Precio compra:</label>
                            <input type="number" class="form-control" name="u_prod_arrival_price" id="u_prod_arrival_price" value="<?= $prod_arrival_price ?>" onkeypress="return solonumeros(event);">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Precio venta:</label>
                            <input type="number" class="form-control" name="u_prod_selling_price" id="u_prod_selling_price" value="<?= $prod_selling_price ?>" onkeypress="return solonumeros(event);">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Iva:</label>
                            <input type="text" class="form-control" name="u_prod_iva" id="u_prod_iva" value="<?= $prod_iva ?>">
                        </div>


                    </div>
                    <input type="hidden" id="id" name="id" value="<?= $prod_code_plu; ?>">
                    <br>
                    <button type="button" class="btn btn-primary" onclick="Product.updateProduct()">
                        <i class="bi bi-check-square"> Guardar</i>
                    </button>
                </form>
            </div>
        </div>

<?php
    }
}
?>