<?php
    session_start();
    
    include '../../clases/Inicio.php';

    $idUsuario= $_SESSION['usuario']['id'];

    $datos= array(
        'paterno' => $_POST['paternoInicio'],
        'materno' => $_POST['maternoInicio'],
        'nombre' => $_POST['nombreInicio'],
        'telefono' => $_POST['telefonoInicio'],
        'correo' => $_POST['correoInicio'],
        'fecha' => $_POST['fechaNacInicio'],
        'idUsuario' => $idUsuario

    );

    $Inicio = new Inicio ();
    echo $Inicio->actualizarPersonales($datos);

?>
