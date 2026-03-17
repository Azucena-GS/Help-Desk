<!-- Modal -->
<form id="frmAsignaEquipo" method="POST" onsubmit="return asignarEquipo()">
  <div class="modal fade" id="modalAsignarEquipo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Asignar Equipo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="row">
              <div class="col-sm-6">
                <label>Nombre de la persona</label>
                <?php
                    $sql="SELECT 
                              persona.id_persona,
                              CONCAT(paterno, ' ', materno, ' ', nombre) AS nombre
                          FROM
                              t_persona AS persona
                                  INNER JOIN
                              t_usuarios AS usuario ON persona.id_persona = usuario.id_persona
                                  AND usuario.id_rol = 1
                          ORDER BY persona.paterno";
                    $respuesta=mysqli_query($conexion, $sql);
                ?>
                <select name="idPersona" id="idPersona" class="form-control" required>
                  <option value="">Selcciona una opcion</option> 
                   <?php while($mostrar=mysqli_fetch_array($respuesta)){?>
                   <option value="<?php echo $mostrar['id_persona']?>"><?php echo $mostrar['nombre'] ?></option>
                   <?php } ?>
                </select>
              </div>

              <div class="col-sm-6">
                <label>Tipo de equipo</label>
                <?php  
                  $sql="SELECT id_equipo, nombre FROM t_cat_equipo ORDER BY nombre";
                  $respuesta=mysqli_query($conexion, $sql);            
                ?>
                <select name="idEquipo" id="idEquipo" class="form-control" required>
                  <option value="">Selcciona una opcion</option>
                   <?php while($mostrar=mysqli_fetch_array($respuesta)){?>
                   <option value="<?php echo $mostrar['id_equipo']?>"><?php echo $mostrar['nombre'] ?></option>
                   <?php } ?>
                </select>
              </div>
            </div>

            <div class="row"> 
              <div class="col-sm-4">
                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control">
              </div>
              <div class="col-sm-4">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control">
              </div>
              <div class="col-sm-4">
                <label for="color">Color</label>
                <input type="text" name="color" id="color" class="form-control">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-4">    
                <label for="memoria">Memoria</label>
                <input type="text" name="memoria" id="memoria" class="form-control">
              </div>
              <div class="col-sm-4">
                <label for="discoDuro">Disco duro</label>
                <input type="text" name="discoDuro" id="discoDuro" class="form-control">
              </div>
              <div class="col-sm-4">
                <label for="procesador">Procesador</label>
                <input type="text" name="procesador" id="procesador" class="form-control">
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary">Asignar</button>
          </div>
        </div>
    </div>
  </div>

</form>
