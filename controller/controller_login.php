<?php

session_start();
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"] and !empty($_POST["password"]))){
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$conexion->query(" select * from usuario where usario='$usuario' and password='$password' ");
        if ($datos=$sql->fetch_object()) {
            $_SESSION["id"]=$datos->id;
            $_SESSION["nombres"]=$datos->nombres;
            $_SESSION["apellidos"]=$datos->apellidos;
            header("location: index.php");
        } else {
            echo "<div class='alert alert-danger'>ACCESO DENEGADO</div>";
        }
        
    } else {
        echo "<div class='alert alert-warning'>CAMPOS VACÍOS</div>";
    }
    
}

?>