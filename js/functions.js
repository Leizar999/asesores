$(document).ready(function () {

    // Listeners for the buttons in the main page
    $("#insertarCliente").on("click", function(){
        window.open("/asesores/view/recogerDatos.php");
    });

    $("#verClientes").on("click", function(){
        window.open("/asesores/view/cliente.php");
    });
});
