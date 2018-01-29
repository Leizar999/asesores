$(document).ready(function () {

    // Listeners for the buttons in the main page
    $("#insertarCliente").on("click", function(){
        window.open("/asesores/view/recogerDatos.php", "_self");
    });

    $("#consultarMantenimiento").on("click", function(){
        window.open("/asesores/view/mantenimiento.php", "_self");
    });

    $("#verClientes").on("click", function(){
        window.open("/asesores/view/cliente.php", "_self");
    });
});
