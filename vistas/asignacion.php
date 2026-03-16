<?php include_once 'header.php';

  if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol']== 2){  
      include_once '../clases/Conexion.php';
      $con= new conexion();
      $conexion=$con->conectar();

 ?>
<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Asignacion de dispositivos</h1>
         <p class="lead">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarEquipo">
            Asigar equipo
          </button>
          <hr>
          <div id="tablaAsignacionLoad"> </div>
         </p>   
    </div>
   </div>
</div>

  <?php
  include_once 'asignacion/modalAsignar.php';
  include_once 'footer.php';
  ?>
  <script src="../public/js/asignacion/asignacion.js"></script>

<?php
  }else{
    header("location:../index.html");
  }
 ?>