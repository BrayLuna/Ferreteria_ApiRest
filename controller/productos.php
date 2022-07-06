<?php
//Encabezado para que php reconozca que se van a intercambiar archivos JSON

header('Content-Type: application/json');
//Este es el controlador del API, aqui se van a realizar las operaciones del crud

    require_once "../config/conexion.php";
    require_once "../models/Productos.php";

    $body = json_decode(file_get_contents("php://input"), true);

    $producto = new Producto(); //instanciar el objeto

    //craer el webservice que realice las acciones del crud por medio de la api rest
    //el switch  sera el encargado de atender las peticiones

    switch ($_GET["opcion"]){
        //Este caso, recupera todos lo datos de la tabla productos
        // la informacion es traia de lo que indica el archivo
        // models-> Productos.php-> metodo $_get_productos()

        case "getAll":
            $datos = $producto-> get_producto();
            echo json_encode($datos);
            break;
        //Para recuperar un registo se ocupa get,que tiene el id de producto
        case "get":
            $datos = $producto-> get_producto_id($body["id"]);  // id de la tabla a consultar
            echo json_encode($datos);
            break; 
        // Insertar un registro nuevo a la base de datos
        case "insert":
            $datos = $producto-> insert_producto($body["nombre"], $body["marca"], $body["descripcion"], $body["precio"]);  // id de la tabla a consultar
            echo json_encode("UWU producto insertado, GRACIAS PAPU 👉👈");
            break; 
        case "update":
            $datos = $producto-> update_producto( $body["id"],$body["nombre"], $body["marca"], $body["descripcion"], $body["precio"]);  // id de la tabla a consultar
            echo json_encode("UWU producto insertado, GRACIAS 👉👈");
            break;
        case "delate":
            $datos = $producto-> delateFULL_producto($body["id"]);  // id de la tabla a consultar
            echo json_encode("Haz elimianado a un papu INSANO GRACIAS 👉👈");
            break;
        case "getSucursales":
            $datos = $producto-> get_sucursales();
            echo json_encode($datos);
            break;
    }

?>