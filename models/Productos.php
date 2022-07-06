<?php

//archvio que contiene los querys necesarios para realizar las transacciones en las tablas

// clase general

class Producto extends Conectar{
    //metodo que recupera todos los productos de la tabla, donde su estado es 1
    public function get_producto(){
        $conectar = parent:: conexion();
        parent:: set_names();
        $sql = "SELECT id, nombre, marca, descripcion, precio FROM productos WHERE estado = 1";
        $sql = $conectar -> prepare($sql);
        $sql-> execute();
        return $resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //solamente un registro de la tabla productos

    public function get_producto_id ($id_producto) {
        $conectar = parent:: conexion();
        parent:: set_names();
        $sql = "SELECT id, nombre, marca, descripcion, precio FROM productos WHERE estado = 1 AND id=?";
        $sql = $conectar -> prepare($sql);
        $sql ->bindValue(1,$id_producto);
        $sql-> execute();
        return $resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    // Insertar un nuevo producto
    public function insert_producto ($nombre,$marca, $descripcion, $precio) {
        $conectar = parent:: conexion();
        parent:: set_names();
        $sql = "INSERT INTO productos (id, nombre, marca, descripcion, precio, estado) VALUES (NULL, ?, ?, ?,?, '1')";
        $sql = $conectar -> prepare($sql);
        $sql ->bindValue(1,$nombre);
        $sql ->bindValue(2,$marca);
        $sql ->bindValue(3,$descripcion);
        $sql ->bindValue(4,$precio);
        $sql-> execute();
        return $resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //Actualizar los datos de un producto
    public function update_producto ($id,$nombre,$marca, $descripcion, $precio) {
        $conectar = parent:: conexion();
        parent:: set_names();
        $sql = "UPDATE productos SET nombre = ?, marca = ?, descripcion = ?, precio = ? WHERE id = ?";
        $sql = $conectar -> prepare($sql);
        $sql ->bindValue(1,$nombre);
        $sql ->bindValue(2,$marca);
        $sql ->bindValue(3,$descripcion);
        $sql ->bindValue(4,$precio);
        $sql ->bindValue(5,$id);
        $sql-> execute();
        return $resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //borrar un producto
    public function delate_producto ($id) {
        $conectar = parent:: conexion();
        parent:: set_names();
        $sql = "UPDATE productos SET estado = 0 WHERE id = ?";
        $sql = $conectar -> prepare($sql);
        $sql ->bindValue(1,$id);
        $sql-> execute();
        return $resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delateFULL_producto ($id) {
        $conectar = parent:: conexion();
        parent:: set_names();
        $sql = "DELATE FROM productos  WHERE id = ?";
        $sql = $conectar -> prepare($sql);
        $sql ->bindValue(1,$id);
        $sql-> execute();
        return $resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_sucursales(){
        $conectar = parent:: conexion();
        parent:: set_names();
        $sql = "SELECT * FROM sucursales ";
        $sql = $conectar -> prepare($sql);
        $sql-> execute();
        return $resultado =$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>