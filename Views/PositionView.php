<?php

class PositionView
{

    function paginatePosition($array_positions)
    {


?>

        <div class="card">
            <div class="card-header text-center bg-info text-black">
                Registrar Cargo
            </div>
            <div class="card-body">
                <form id="insert_position">
                    <p>
                    <div class="form-group">
                        <label for="">Nombre del cargo</label>
                        <input type="text" class="form-control" name="emti_name" id="emti_name">
                    </div>
                    </p>
                    <p>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <input type="text" class="form-control" name="emti_description" id="emti_description">
                    </div>
                    </p>
                    <p>
                        <button type="button" class="btn btn-primary float-right" onclick="Position.insertPosition()">
                            <i class="bi bi-cloud-upload"> Guardar</i>
                        </button>
                    </p>
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <br>
            <div class="search-bar">
                <form id="form_consult_position" class="search-form align-items-center" method="POST" action="#">
                    <div class="row mb-10">
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="consult_position" id="consult_position" placeholder="Busqueda por documento" title="Enter search keyword">
                        </div>
                        <div class="col-md-1">
                            <button class="form-control " type="button" title="Consulta por codigo"><i class="bi bi-search" onclick="Position.consultPosition()"></i></button>
                        </div>
                        <div class="col-md-1">
                            <button class="form-control " type="button" title="Recargar"><i class="bi bi-arrow-counterclockwise" onclick="Menu.menu('PositionController/paginatePosition')"></i></button>
                        </div>
                    </div>
                </form>

            </div>
            <br>
            <div class="card-header bg-info text-black">
                Listar Cargos
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cargo</th>
                                <th>Descripcion</th>
                                <th style="text-align:center;">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_positions as $object_position) {
                                $emti_id = $object_position->emti_id;
                                $emti_name = $object_position->emti_name;
                                $emti_description = $object_position->emti_description;
                            ?>
                                <tr>
                                    <td> <?php echo $emti_id; ?> </td>
                                    <td> <?php echo $emti_name; ?> </td>
                                    <td> <?php echo $emti_description; ?> </td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Position.showPosition('<?= $emti_id ?>')"></i>
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
    } // <----- paginateposition($array_positions)---->
    function showPosition($array_positions)
    {
        $emti_id = $array_positions[0]->emti_id;
        $emti_name = $array_positions[0]->emti_name;
        $emti_description = $array_positions[0]->emti_description;
    ?>

        <div class="card">
            <div class="card-body">
                <form id="update_position">
                    <p>
                    <div class="form-group">
                        <label for="">Nombre del cargo</label>
                        <input type="text" class="form-control" name="emti_name" id="emti_name" value="<?= $emti_name ?>">
                        <input type="hidden" name="emti_name_1" id="emti_name_1" value="<?= $emti_name ?>">
                    </div>
                    </p>
                    <p>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <input type="text" class="form-control" name="emti_description" id="emti_description" value="<?= $emti_description ?>">
                    </div>
                    </p>
                    <input type="hidden" id="id" name="id" value="<?= $emti_id; ?>">
                    <button type="button" class="btn btn-primary" onclick="Position.updatePosition()">
                        <i class="bi bi-check-square"> Guardar</i>
                    </button>
                </form>
            </div>
        </div>

<?php
    }
}
?>