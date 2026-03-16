<?php

    $idReporte = $_POST['idReporte'];
    include_once "../../clases/Reportes.php";
    $Reportes=new Reportes();
    echo $Reportes->eliminarReporteCliente($idReporte);
?>