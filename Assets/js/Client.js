class ClientJs {

    insertClient() {
        var object = new FormData(document.querySelector('#insert_client'));
        fetch('ClientController/insertClient', {
            method: 'POST',
            body: object
        })
            .then((resp) => resp.text())
            .then(function (response) {

                try {
                    object = JSON.parse(response);
                    //alert("entrado al sistema");
                    Swal.fire({
                        icon: "error",
                        title: "ERROR DE CAMPOS",
                        text: object.message,
                    });
                } catch (error) {
                    document.querySelector("#content").innerHTML = response;

                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'EXITO',
                        html: 'CLIENTE REGISTRADO CON EXITO <br> LA VENTANA SE CERRARA EN <b></b>',
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('CLIENTE REGISTRADO CON EXITO')
                        }
                    })


                }

            })
            .catch(function (error) {
                console.log(error);
            });
    }

    showClient(id) {
        var object = new FormData();

        object.append('id', id);

        fetch('ClientController/showClient', {
            method: 'POST',
            body: object
        })
            .then((resp) => resp.text())
            .then(function (response) {
                $('#my_modal').modal('show');

                document.querySelector('#modal_title').innerHTML = "Actualizar Cliente";

                document.querySelector('#modal_content').innerHTML = response;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    updateClient() {
        var object = new FormData(document.querySelector('#update_Client'));

        fetch('ClientController/updateClient', {
            method: 'POST',
            body: object
        })
            .then((resp) => resp.text())
            .then(function (response) {
                try {
                    object = JSON.parse(response);
                    Swal.fire({
                        icon: "error",
                        title: "ERROR",
                        text: object.message,
                    });
                } catch (error) {
                    document.querySelector('#content').innerHTML = response;
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'EXITO',
                        html: 'CLIENTE ACTUALIZADA CON EXITO <br> LA VENTANA SE CERRARA EN <b></b>',
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('CLIENTE ACTUALIZADA CON EXITO')
                        }
                    })
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    consultClient() {
        var object = new FormData(document.querySelector("#form_consulta_client"));
        fetch("ClientController/consultClient", {
            method: "POST",
            body: object,
        })
            .then((respuesta) => respuesta.text())
            .then(function (response) {
                try {
                    object = JSON.parse(response);
                    Swal.fire({
                        icon: "error",
                        title: "ERROR",
                        text: object.message,
                    });
                } catch (error) {
                    document.querySelector("#content").innerHTML = response;
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'EXITO',
                        html: 'BUSQUEDA EXITOSA <br>LA VENTANA SE CERRARA EN <b></b>',
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('BUSQUEDA EXITOSA')
                        }
                    })
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }

}
var Client = new ClientJs();

function sololetras(e) {

    key = e.keyCode || e.which;

    teclado = String.fromCharCode(key).toLowerCase();

    letras = " abcdefghijklmnñopqrstuvwxyz";

    especiales = " 8-37-38-46-164";

    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true; break;

        }
    }

    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        return false;
    }

    console.log("HOLAAA");

}

function solonumeros(evt) {

    var code = (evt.which) ? evt.which : evt.keyCode;

    if (code == 8) {
        return true;
    } else if (code >= 48 && code <= 57) {
        return true;
    } else {
        return false;
    }
}