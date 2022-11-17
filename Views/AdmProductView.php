<?php
class AdmProductView
{
    function paginateAdmProduct($array_Admproducts)
    {
?>

<div class="card">
            <div class="card-header bg-danger text-black text-center">
                LISTAR CAMBIOS DE PRODUCTOS
            </div>

            <div class="card-body">
                <br>

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
                                <th>FECHA CAMBIO</th>
                                <th>USUARIO</th>
                                <th>ACCION</th>
                                <th style="text-align:center;">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_Admproducts as $object_admproduct) {
                                $audi_prod_reference = $object_admproduct->audi_prod_reference;
                                $audi_prod_code_plu = $object_admproduct->audi_prod_code_plu;
                                $audi_prod_description = $object_admproduct->audi_prod_description;
                                $audi_prod_available_quantity = $object_admproduct->audi_prod_available_quantity;
                                $audi_prod_arrival_price = $object_admproduct->audi_prod_arrival_price;
                                $audi_prod_selling_price = $object_admproduct->audi_prod_selling_price;
                                $audi_prod_iva = $object_admproduct->audi_prod_iva;
                                $audi_modification_date = $object_admproduct->audi_modification_date;
                                $audi_prod_user = $object_admproduct->audi_prod_user;
                                $audi_prod_accion = $object_admproduct->audi_prod_accion;
                            ?>
                                <tr class="text-center">
                                    <td> <?= $audi_prod_reference; ?> </td>
                                    <td> <?= $audi_prod_code_plu; ?> </td>
                                    <td> <?= $audi_prod_description; ?> </td>
                                    <td> <?= $audi_prod_available_quantity; ?> </td>
                                    <td> $<?=$audi_prod_arrival_price; ?> </td>
                                    <td> $<?=$audi_prod_selling_price; ?> </td>
                                    <td> <?= $audi_prod_iva; ?> </td>
                                    <td> <?= $audi_modification_date; ?> </td>
                                    <td> <?= $audi_prod_user; ?> </td>
                                    <td> <?= $audi_prod_accion; ?> </td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Product.showProduct('<?= $audi_prod_code_plu ?>')"></i>
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
    }
}
?>