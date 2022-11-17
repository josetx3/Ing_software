<?php

class PersonView
{
    function paginatePerson($array_persons, $array_positions)
    {
?>
        <div class="card">
            <div class="card-header text-center bg-info text-black">
                Registrar Persona
            </div>
            <br>
            <div class="card-body">
                <form id="insert_person">

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">Documento:</label>
                            <input type="number" class="form-control" name="document" id="document" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nombre 1:</label>
                            <input type="text" class="form-control" name="name1" id="name1" onkeypress="return sololetras(event);" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nombre 2:</label>
                            <input type="text" class="form-control" name="name2" id="name2" onkeypress="return sololetras(event);">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Apellido 1:</label>
                            <input type="text" class="form-control" name="lastname1" id="lastname1" onkeypress="return sololetras(event);" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Apellido 2:</label>
                            <input type="text" class="form-control" name="lastname2" id="lastname2" onkeypress="return sololetras(event);">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Direccion:</label>
                            <input type="text" class="form-control" name="address" id="address" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Sexo:</label>
                            <select class="form-select" name="sex" id="sex" required>
                                <option value="">Seleccione...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="I">Indefinido</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Celular:</label>
                            <input type="number" class="form-control" name="telephone" id="telephone" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control" name="pasword" id="pasword" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Repetir Contraseña</label>
                            <input type="password" class="form-control" name="pasword1" id="pasword1" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Cargo:</label>
                            <select class="form-select" name="emti_id" id="emti_id">
                                <option value="">Seleccione...</option>
                                <?php
                                if ($array_positions) {
                                    foreach ($array_positions as $object_position) {
                                        $emti_id = $object_position->emti_id;
                                        $emti_name = $object_position->emti_name;
                                        $emti_description = $object_position->emti_description;
                                ?>
                                        <option value="<?= $emti_id; ?>"><?= $emti_name; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Estado:</label>
                            <select class="form-select" name="acce_state" id="acce_state" required>
                                <option value="">Seleccione...</option>
                                <option value="EA">Activo</option>
                                <option value="ED">Desactivo</option>
                            </select>
                        </div>

                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary float-right" onclick="Person.insertPerson()">
                                <i class="bi bi-cloud-upload"> Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>



        <br>
        <div class="card">
            <div class="card-header bg-info text-black text-center">
                Listar Personas
            </div>
            <div class="card-body">

                <br>
                <div class="search-bar">
                    <form id="form_consulta_person" class="search-form align-items-center" method="POST" action="#">
                        <div class="row mb-10">
                            <!-- <div class="form-group col-md-2">
                                <select class="form-select" name="filter_search" id="filter_search" required>
                                    <option value="">Ingrese el metodo de busqueda...</option>
                                    <option value="acce_document">Documento</option>
                                    <option value="acce_name1">Nombre</option>
                                    <option value="acce_email">Email</option>
                                </select>
                            </div> -->
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
                                <th style="text-align:center;">Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_persons as $object_person) {
                                $document = $object_person->acce_document;
                                $name1 = $object_person->acce_name1;
                                $name2 = $object_person->acce_name2;
                                $lastname1 = $object_person->acce_lastname1;
                                $lastname2 = $object_person->acce_lastname2;
                                $address = $object_person->acce_address;
                                $sex = $object_person->acce_sex;
                                $telephone_number = $object_person->acce_telephone_number;
                                $email = $object_person->acce_email;
                                $pasword = $object_person->acce_password;
                                //$emti_id = $object_person->emti_id;
                                $emti_id = $object_person->emti_name;
                                $acce_state = $object_person->acce_state;
                            ?>
                                <tr class="text-center align-items-center">
                                    <td> <?= $document; ?> </td>
                                    <td> <?= $name1; ?> </td>
                                    <td> <?= $name2; ?> </td>
                                    <td> <?= $lastname1; ?> </td>
                                    <td> <?= $lastname2; ?> </td>
                                    <td> <?= $address; ?> </td>
                                    <td> <?= $sex; ?> </td>
                                    <td> <?= $telephone_number; ?> </td>
                                    <td> <?= $email ?> </td>
                                    <td type="password"> <?= $pasword; ?> </td>
                                    <td> <?= $emti_id; ?> </td>
                                    <td> <?= $acce_state; ?> </td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Person.showPerson('<?= $document ?>')"></i>
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
    } // <----- paginatePerson($array_persons)---->
    function showPerson($array_persons, $array_positions)
    {
        $document = $array_persons[0]->acce_document;
        $name1 = $array_persons[0]->acce_name1;
        $name2 = $array_persons[0]->acce_name2;
        $lastname1 = $array_persons[0]->acce_lastname1;
        $lastname2 = $array_persons[0]->acce_lastname2;
        $address = $array_persons[0]->acce_address;
        $telephone_number = $array_persons[0]->acce_telephone_number;
        $email = $array_persons[0]->acce_email;
        $pasword = $array_persons[0]->acce_password;
        $emti_id = $array_persons[0]->emti_id;
        $acce_state = $array_persons[0]->acce_state;

    ?>

        <div class="card">
            <div class="card-body">
                <form id="update_Person">

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">Documento:</label>
                            <input type="text" class="form-control" name="u_document" id="u_document" value="<?= $document ?> " readOnly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nombre 1:</label>
                            <input type="text" class="form-control" name="u_name1" id="name1" value="<?= $name1 ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Nombre 2:</label>
                            <input type="text" class="form-control" name="u_name2" id="name2" value="<?= $name2 ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Apellido 1:</label>
                            <input type="text" class="form-control" name="u_lastname1" id="lastname1" value="<?= $lastname1 ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Apellido 2:</label>
                            <input type="text" class="form-control" name="u_lastname2" id="lastname2" value="<?= $lastname2 ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Direccion:</label>
                            <input type="text" class="form-control" name="u_address" id="address" value="<?= $address ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Celular:</label>
                            <input type="text" class="form-control" name="u_telephone" id="telephone" value="<?= $telephone_number ?>">
                            <input type="hidden" class="form-control" name="u_telephone_1" id="telephone_1" value="<?= $telephone_number ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Email:</label>
                            <input type="email" class="form-control" name="u_email" id="u_email" value="<?= $email ?>" required>
                            <input type="hidden" class="form-control" name="u_email_1" id="u_email_1" value="<?= $email ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Contraseña</label>
                            <input type="text" class="form-control" name="u_pasword" id="pasword" value="<?= $pasword ?>">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="">Estado:</label>
                            <select class="form-select" name="acce_state" id="acce_state" required>
                                <option value="">seleccione...</option>
                                <option value="EA">Activo</option>
                                <option value="ED">Desactivo</option>
                            </select>
                        </div>



                    </div>
                    <input type="hidden" id="id" name="id" value="<?= $document; ?>">
                    <br>
                    <button type="button" class="btn btn-primary" onclick="Person.updatePerson()">
                        <i class="bi bi-check-square"> Guardar</i>
                    </button>
                </form>
            </div>
        </div>

<?php
    }
}
?>