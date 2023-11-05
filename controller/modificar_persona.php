<?php

if (!empty($_POST["btn_register"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fecha_nac"]) and !empty($_POST["correo"]) ) {
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $dni=$_POST["dni"];
        $fecha_nac=$_POST["fecha_nac"];
        $correo=$_POST["correo"];
        $sql=$conexion->query(" update persona set nombre='$nombre',apellido='$apellido',DNI='$dni',fecha_nacimiento='$fecha_nac',correo='$correo' where id_persona=$id ");
        if ($sql==1) {
            header("location: index.php");
        } else {
            echo "<div class='alert alert-danger'>ERROR en la actualización de datos</div>";
        }
        
    }else{
        echo "<div class='alert alert-warning'>campos vacios</div>";
    }
}


?>