<?php
class ClientView
{
    function paginateClient($array_clients)
    {
?>

        <div class="card">
            <div class="card-header text-center bg-info text-black">
                Registrar Cliente
            </div>
            <br>
            <div class="card-body">
                <form id="insert_client">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">Documento</label>
                            <input type="number" class="form-control" name="cliente_documento" id="cliente_documento" onkeypress="return solonumeros(event)"  required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="cliente_nombre" id="cliente_nombre" onkeypress="return sololetras(event);" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Correo</label>
                            <input type="text" class="form-control" name="cliente_correo" id="cliente_correo" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Sexo</label>
                            <select class="form-select" name="cliente_sexo" id="cliente_sexo" required>
                                <option value="">Seleccione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="I">Indefinido</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Telefono</label>
                            <input type="number" class="form-control" name="cliente_telefono" id="cliente_telefono" onkeypress="return solonumeros(event)" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Direccion</label>
                            <input type="text" class="form-control" name="cliente_direccion" id="cliente_direccion" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Barrio</label>
                            <input type="text" class="form-control" name="cliente_barrio" id="cliente_barrio" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nombre negocio</label>
                            <input type="text" class="form-control" name="cliente_nombre_negocio" id="cliente_nombre_negocio" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nit negocio</label>
                            <input type="number" class="form-control" name="cliente_nit_negocio" id="cliente_nit_negocio" onkeypress="return solonumeros(event)" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Estado</label>
                            <select class="form-select" name="cliente_estado" id="cliente_estado" required>
                                <option value="">Seleccione...</option>
                                <option value="EA">Activo</option>
                                <option value="ED">Desactivo</option>
                            </select>
                        </div>

                    </div>


                    <br>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary float-right" onclick="Client.insertClient()">
                                <i class="bi bi-cloud-upload">Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-info text-black text-center">
                Listar Clientes
            </div>
            <div class="card-body">

                <br>
                <div class="search-bar">
                    <form id="form_consulta_client" class="search-form align-items-center" method="POST" action="#">
                        <div class="row mb-10">
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="consult_client" id="consult_client" placeholder="Barra de busqueda" title="SE puede consultar por | documento , nombre , correo , telefono , nit negocio , nombre negocio |">
                            </div>
                            <div class="col-md-1">
                                <button class="form-control " type="button" title="Consulta el cliente"><i class="bi bi-search" onclick="Client.consultClient()"></i></button>
                            </div>
                            <div class="col-md-1">
                                <button class="form-control " type="button" title="Recargar"><i class="bi bi-arrow-counterclockwise" onclick="Menu.menu('ClientController/paginateClient')"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class=" text-center">
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Sexo</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Barrio</th>
                                <th>Nombre negocio</th>
                                <th>Nit negocio</th>
                                <th>Estado</th>
                                <th style="text-align:center;">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_clients as $object_client) {
                                $cliente_documento = $object_client->cliente_documento;
                                $cliente_nombre = $object_client->cliente_nombre;
                                $cliente_correo = $object_client->cliente_correo;
                                $cliente_sexo = $object_client->cliente_sexo;
                                $cliente_telefono = $object_client->cliente_telefono;
                                $cliente_direccion = $object_client->cliente_direccion;
                                $cliente_barrio = $object_client->cliente_barrio;
                                $cliente_nombre_negocio = $object_client->cliente_nombre_negocio;
                                $cliente_nit_negocio = $object_client->cliente_nit_negocio;
                                $cliente_estado = $object_client->cliente_estado;
                            ?>
                                <tr class="text-center align-items-center">
                                    <td> <?= $cliente_documento; ?> </td>
                                    <td> <?= $cliente_nombre; ?> </td>
                                    <td> <?= $cliente_correo; ?> </td>
                                    <td> <?= $cliente_sexo; ?> </td>
                                    <td> <?= $cliente_telefono; ?> </td>
                                    <td> <?= $cliente_direccion; ?> </td>
                                    <td> <?= $cliente_barrio; ?> </td>
                                    <td> <?= $cliente_nombre_negocio; ?> </td>
                                    <td> <?= $cliente_nit_negocio ?> </td>
                                    <td> <?= $cliente_estado; ?> </td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Client.showClient('<?= $cliente_documento ?>')"></i>
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
    function showClient($array_clients)
    {
        $cliente_documento = $array_clients[0]->cliente_documento;
        $cliente_nombre = $array_clients[0]->cliente_nombre;
        $cliente_correo = $array_clients[0]->cliente_correo;
        $cliente_sexo = $array_clients[0]->cliente_sexo;
        $cliente_telefono = $array_clients[0]->cliente_telefono;
        $cliente_direccion = $array_clients[0]->cliente_direccion;
        $cliente_barrio = $array_clients[0]->cliente_barrio;
        $cliente_nombre_negocio = $array_clients[0]->cliente_nombre_negocio;
        $cliente_nit_negocio = $array_clients[0]->cliente_nit_negocio;
        $cliente_estado = $array_clients[0]->cliente_estado;
    ?>

        <div class="card">
            <div class="card-body">
                <form id="update_Client">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">Documento</label>
                            <input type="number" class="form-control" name="cliente_documento" id="cliente_documento" value="<?= $cliente_documento ?>" onkeypress="return solonumeros(event)" required>
                            <input type="hidden" class="form-control" name="cliente_documento1" id="cliente_documento1" value="<?= $cliente_documento ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="cliente_nombre" id="cliente_nombre" value="<?= $cliente_nombre ?>" onkeypress="return sololetras(event);" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Correo</label>
                            <input type="text" class="form-control" name="cliente_correo" id="cliente_correo" value="<?= $cliente_correo ?>" required>
                            <input type="hidden" class="form-control" name="cliente_correo1" id="cliente_correo1" value="<?= $cliente_correo ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Sexo</label>
                            <select class="form-select" name="cliente_sexo" id="cliente_sexo" required>
                                <option value="">Seleccione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="I">Indefinido</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Telefono</label>
                            <input type="text" class="form-control" name="cliente_telefono" id="cliente_telefono" value="<?= $cliente_telefono ?>" required>
                            <input type="hidden" class="form-control" name="cliente_telefono1" id="cliente_telefono1" value="<?= $cliente_telefono ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Direccion</label>
                            <input type="text" class="form-control" name="cliente_direccion" id="cliente_direccion" value="<?= $cliente_direccion ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Barrio</label>
                            <input type="text" class="form-control" name="cliente_barrio" id="cliente_barrio" value="<?= $cliente_barrio ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nombre negocio</label>
                            <input type="text" class="form-control" name="cliente_nombre_negocio" id="cliente_nombre_negocio" value="<?= $cliente_nombre_negocio ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nit negocio</label>
                            <input type="text" class="form-control" name="cliente_nit_negocio" id="cliente_nit_negocio" value="<?= $cliente_nit_negocio ?>" required>
                            <input type="hidden" class="form-control" name="cliente_nit_negocio1" id="cliente_nit_negocio1" value="<?= $cliente_nit_negocio ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Estado</label>
                            <select class="form-select" name="cliente_estado" id="cliente_estado" required>
                                <option value="">Seleccione...</option>
                                <option value="EA">Activo</option>
                                <option value="ED">Desactivo</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <input type="hidden" id="id" name="id" value="<?= $cliente_documento ?>">
                        <br>
                        <button type="button" class="btn btn-primary" onclick="Client.updateClient()">
                            <i class="bi bi-check-square">Guardar</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

<?php
    }
}
