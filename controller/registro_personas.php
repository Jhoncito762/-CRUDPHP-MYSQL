<?php

if (!empty($_POST["btn_register"])){
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fecha_nac"]) and !empty($_POST["correo"])){
        
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $dni=$_POST["dni"];
        $fecha_nac=$_POST["fecha_nac"];
        $correo=$_POST["correo"];

        $sql=$conexion->query("INSERT INTO persona(nombre,apellido,DNI,fecha_nacimiento,correo)values('$nombre','$apellido','$dni','$fecha_nac','$correo')");
        if($sql==1){
            echo '<div class="alert alert-success">Persona registrada correctamente</div>';
        }else{
            echo '<div class="alert alert-danger">Persona registrada incorrectamente</div>';
        }
    }else{
        echo '<div class="alert alert-danger">TODOS los campos deben ser rellenados</div>';
    }
}

?>