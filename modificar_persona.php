<?php
include "models/conexion.php";
$id = $_GET["id"];

$sql = $conexion->query(" select * from persona where id_persona=$id ");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center p-3">Registro de personas</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"]?>">
        <?php
        include "controller/modificar_persona.php";
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-1">
                <label for="exampleInputName" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre?>">
            </div>
            <div class="mb-1">
                <label for="exampleInputName" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido?>">
            </div>
            <div class="mb-1">
                <label for="exampleInputName" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="<?= $datos->DNI?>">
            </div>
            <div class="mb-1">
                <label for="exampleInputName" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha_nac" value="<?= $datos->fecha_nacimiento?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo" value="<?= $datos->correo?>">
            </div>
        <?php }

        ?>

        <button type="submit" class="btn btn-primary" name="btn_register" value="ok">ACTUALIZAR</button>
    </form>
</body>

</html>