<?php
class AdmPersonView
{
    function paginateAdmPerson($array_Admpersons, $array_positions)
    {
?>

        <div class="card">
            <div class="card-header bg-danger text-black text-center">
                LISTA DE CAMBIOS DE USUARIOS
            </div>
            <div class="card-body">

                <br>
                <div class="search-bar">
                    <form id="form_consulta_person" class="search-form align-items-center" method="POST" action="#">
                        <div class="row mb-10">
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="consulta_person" id="consulta_person" placeholder="Barra de busqueda" title="Enter search keyword">
                            </div>
                            <div class="col-md-1">
                                <button class="form-control " type="button" title="Consulta por documento"><i class="bi bi-search" onclick="Person.consultPerson()"></i></button>
                            </div>
                            <div class="col-md-1">
                                <button class="form-control " type="button" title="Recargar"><i class="bi bi-arrow-counterclockwise" onclick="Menu.menu('PersonController/paginatePerson')"></i></button>
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
                                <th>Nombre 1</th>
                                <th>Nombre 2</th>
                                <th>Apellido 1</th>
                                <th>Apellido 2</th>
                                <th>Direccion</th>
                                <th>Sexo</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>pasword</th>
                                <th>CARGO</th>
                                <th>Estado</th>
                                <th>FECHA CAMBIO</th>
                                <th>USUARIO</th>
                                <th>ACCION</th>
                                <th style="text-align:center;">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_Admpersons as $object_admperson) {
                                $audi_document = $object_admperson->audi_acce_document;
                                $audi_name1 = $object_admperson->audi_acce_name1;
                                $audi_name2 = $object_admperson->audi_acce_name2;
                                $audi_lastname1 = $object_admperson->audi_acce_lastname1;
                                $audi_lastname2 = $object_admperson->audi_acce_lastname2;
                                $audi_address = $object_admperson->audi_acce_address;
                                $audi_sex = $object_admperson->audi_acce_sex;
                                $audi_telephone_number = $object_admperson->audi_acce_telephone_number;
                                $audi_email = $object_admperson->audi_acce_email;
                                $audi_pasword = $object_admperson->audi_acce_password;
                                $audi_emti_id = $object_admperson->audi_emti_id;
                                $audi_acce_state = $object_admperson->audi_acce_state;
                                $audi_modification_date = $object_admperson->audi_modification_date;
                                $audi_Acce_user = $object_admperson->audi_acce_user;
                                $audi_Acce_accion = $object_admperson->audi_acce_accion;
                            ?>
                                <tr class="text-center align-items-center">
                                    <td> <?= $audi_document; ?> </td>
                                    <td> <?= $audi_name1; ?> </td>
                                    <td> <?= $audi_name2; ?> </td>
                                    <td> <?= $audi_lastname1; ?> </td>
                                    <td> <?= $audi_lastname2; ?> </td>
                                    <td> <?= $audi_address; ?> </td>
                                    <td> <?= $audi_sex; ?> </td>
                                    <td> <?= $audi_telephone_number; ?> </td>
                                    <td> <?= $audi_email ?> </td>
                                    <td> <?= $audi_pasword; ?> </td>
                                    <td> <?= $audi_emti_id; ?> </td>
                                    <td> <?= $audi_acce_state; ?> </td>
                                    <td> <?= $audi_modification_date; ?> </td>
                                    <td> <?= $audi_Acce_user; ?> </td>
                                    <td> <?= $audi_Acce_accion; ?> </td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Person.showPerson('<?= $audi_document ?>')"></i>
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