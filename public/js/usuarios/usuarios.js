$(document).ready(function(){
    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");

});

function agregarNuevoUsuario(){
    $.ajax({
        type:"POST",
        data: $('#frmAgregarUsuario').serialize(),
        url:"../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success:function(respuesta){
            //console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta==1){
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#frmAgregarUsuario')[0].reset();
                Swal.fire("Agregado con exito", ":D");
            }else{
                Swal.fire("Error al agregar "+ respuesta, "error");
            }
        }
    });
    return false;
}

function obtenerDatosUsuario(idUsuario){
    //alert(idUsuario);
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success:function(respuesta){
           respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#paternou').val(respuesta['paterno']);
            $('#maternou').val(respuesta['materno']);
            $('#nombreu').val(respuesta['nombrePersona']);
            $('#fechaNacimientou').val(respuesta['fechaNacimiento']);
            $('#sexou').val(respuesta['sexo']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#usuariou').val(respuesta['usuario']);
            $('#idRolu').val(respuesta['idRol']);
            $('#ubicacionu').val(respuesta['ubicacion']);        
        }
    });
}

function actualizarUsuario(){

    $.ajax({
        type: "POST",
        data: $('#frmActualizarUsuario').serialize(),
        url: "../procesos/usuarios/crud/actualizarUsuario.php",
        success:function(respuesta){
            //console.log(respuesta);
            respuesta=respuesta.trim();
            if (respuesta==1){
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                Swal.fire(":D","Actualizado con exito", ":D");
                $('#modalActualizarUsuarios').modal('hide');

            }else{
                Swal.fire("Error al actualizar "+ respuesta, "error");
            }
        }     
    });
   return false;
}
function agregarIdUsuarioReset(idUsuario){
    $('#idUsuarioReset').val(idUsuario);
}

function resetPassword(){
    $.ajax({
        type:"POST",
    
        data:$('#frmActualizaPassword').serialize(),
        url:"../procesos/usuarios/extras/resetPassword.php",
        success: function (respuesta){

            respuesta=respuesta.trim();
            if (respuesta==1){
    
                Swal.fire(":D","Password actualizado con exito", "success");
                $('#modalResetPassword').modal('hide');

            }else{
                Swal.fire("Error al actualizar password "+ respuesta, "error");
            }

        }

    });
    return false;
}