class ProductJs {

    insertProduct() {
        var object = new FormData(document.querySelector('#insert_product'));
        fetch('ProductController/insertProduct', {
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
                        title: "ERROR CAMPOS",
                        text: object.message,
                    });
                } catch (error) {
                    document.querySelector("#content").innerHTML = response;
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'EXITO',
                        html: 'PRODUCTO REGISTRADO CON EXITO <br>LA VENTANA SE CERRARA EN<b></b>',
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
                            console.log('PRODUCTO REGISTRADO CON EXITO')
                        }
                    })
                }

            })
            .catch(function (error) {
                console.log(error);
            });
    }

    updateProduct() {
        var object = new FormData(document.querySelector('#update_product'));
        fetch('ProductController/updateProduct', {
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
                        html: 'PRODUCTO ACTUALIZADO CON EXITO <br>LA VENTANA SE CERRARA EN<b></b>',
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
                            console.log('PRODUCTO ACTUALIZADO CON EXITO')
                        }
                    })

                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    showProduct(id) {
        var object = new FormData();

        object.append('id', id);

        fetch('ProductController/showProduct', {
            method: 'POST',
            body: object
        })
            .then((resp) => resp.text())
            .then(function (response) {
                $('#my_modal').modal('show');

                document.querySelector('#modal_title').innerHTML = "Actualizar Producto";

                document.querySelector('#modal_content').innerHTML = response;
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    consultProduct() {
        var object = new FormData(document.querySelector("#form_consulta_product"));
        fetch("ProductController/consultProduct", {
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
                        html: 'BUSQUEDA EXITOSA <br>LA VENTANA SE CERRARA EN <b></b> ',
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
var Product = new ProductJs();