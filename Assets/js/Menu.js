class MenuJs {
    closeSession() {
        fetch('AccessController/closeSession')
            .then((resp) => resp.json())
            .then(function (data) { 
                    location.href = "index.php";

            })
            .catch(function (error) {
                console.log(error);
            });
    }

    menu(route) {
        fetch(route)
            .then((resp) => resp.text())
            .then(function (response) {
                $('#content').html(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}

var Menu = new MenuJs();