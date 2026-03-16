$(document).ready(function(){
    $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");    

});

function asignarEquipo(){
    $.ajax({
        type: "POST",
        data: $('#frmAsigaEquipo').serialize(),
        url:"../procesos/asignacion/asignar.php",
        success:function(respuesta){
            //console.log(respuesta);
            respuesta=respuesta.trim();

            if(respuesta==1){
                $('#frmAsigaEquipo')[0].reset();
                $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");
                Swal.fire(":)","Asignado con exito","success");
            }else{
                Swal.fire(":(","No se pudo asignar,fallo" + respuesta ,"error");
            }
        }
     
    });
    return false;
}

function eliminarAsignacion(idAsignacion){
        Swal.fire({
        title: "Estas seguro de eliminar este registro?",
        text: "Una vez eliminado no se podra recuperar!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, eliminar!"
        }).then((result) => {

            if (result.isConfirmed){
                $.ajax({
                    type:"POST",
                    data:'idAsignacion=' + idAsignacion,
                    url:"../procesos/asignacion/eliminarAsignacion.php",
                    success:function (respuesta) {
                        if(respuesta==1){
                            
                            $('#tablaAsignacionLoad').load("asignacion/tablaAsignacion.php");
                            Swal.fire(":)","Eliminado con exito","success");
                        }else{
                            Swal.fire(":(","Fallo al eliminar" + respuesta ,"error");
                        }    
                    }
                });
            }      
        })  
    return false;
}
    