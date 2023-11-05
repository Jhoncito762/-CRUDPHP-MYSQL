<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD + PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e6a159eac1.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center p-3">CRUD EN PHP + PHPMYADMIN | BOOTSTRAP</h1>
    <div class="col-5">
        <?php
        echo $_SESSION["nombres"]." ". $_SESSION["apellidos"];
        ?>
        <a class="btn btn-outline-dark" href="controller/controller_close.php">CERRAR SESIÓN</a>
    </div>
    <?php
    include "models/conexion.php";
    include "controller/eliminar_persona.php";
    ?>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center p-3">Registro de personas</h3>
            <?php
            include "controller/registro_personas.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni">
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha_nac">
            </div>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo">
            </div>
            <button type="submit" class="btn btn-primary" name="btn_register" value="ok">Registrar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Fecha de nacimiento</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "models/conexion.php";
                    $sql=$conexion->query("SELECT * FROM persona");
                    while($datos=$sql->fetch_object()){ ?>
                        <tr>
                        <td><?= $datos->id_persona?></td>
                        <td><?= $datos->nombre?></td>
                        <td><?= $datos->apellido?></td>
                        <td><?= $datos->DNI?></td>
                        <td><?= $datos->fecha_nacimiento?></td>
                        <td><?= $datos->correo?></td>
                        <td>
                            <a href="modificar_persona.php?id=<?= $datos->id_persona?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="index.php?id=<?= $datos->id_persona?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>