<?php

    $idAsignacion = $_POST['idAsignacion'];

    include_once "../../clases/Asignacion.php";
    $Asignacion=new Asignacion();

    echo $Asignacion->eliminarAsignacion($idAsignacion);

?>