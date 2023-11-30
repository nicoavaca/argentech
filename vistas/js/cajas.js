/*=============================================
EDITAR CAJA
=============================================*/
$(".tablas").on("click", ".btnEditarCaja", function(){

	var idCaja = $(this).attr("idCaja");

	var datos = new FormData();
    datos.append("idCaja", idCaja);
    //console.log("idCaja", idCaja);
    $.ajax({

      url:"ajax/cajas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta", respuesta);      
      	 $("#idCaja").val(respuesta["id"]);
	       $("#editarCaja").val(respuesta["num_caja"]);
	       $("#editarTurno").val(respuesta["turno"]);
         $("#editarTurno").html(respuesta["turno"]);
	       $("#editarEstado").val(respuesta["estado"]);
         $("#editarEstado").html(respuesta["estado"]);
         $("#editarFechaA").val(respuesta["f_abierta"]);
         $("#editarFechaC").val(respuesta["f_cerrada"]);

	    }

  	})

})

/*=============================================
ELIMINAR CAJA
=============================================*/
$(".tablas").on("click", ".btnEliminarCaja", function(){

	var idCaja = $(this).attr("idCaja");
	
	swal({
        title: '¿Está seguro de borrar la caja?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar caja!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=cajas&idCaja="+idCaja;
        }

  })

})

/*=============================================
ABRIR CAJA
=============================================*/
$(".tablas").on("click", ".btnAbrirCaja", function(){

  var idCaja = $(this).attr("idCaja");

  var datos = new FormData();
    datos.append("idCaja", idCaja);
    //console.log("idCaja", idCaja);
    $.ajax({

      url:"ajax/cajas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta", respuesta);      
         $("#idCaja").val(respuesta["id"]);
         $("#abrirCaja").val(respuesta["num_caja"]);
         $("#abrirTurno").val(respuesta["turno"]);
         $("#abrirTurno").html(respuesta["turno"]);
         $("#abrirUsuario").val(respuesta["usuario"]);

  /*var idCaja = $(this).attr("idCaja");
  
  swal({
        title: '¿Está seguro de Abrir la caja?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, abrir caja!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=cajas&idCaja="+idCaja;
        }*/

      }

    })

})

/*=============================================
CERRAR CAJA
=============================================*/
$(".tablas").on("click", ".btnCerrarCaja", function(){

  var idCaja = $(this).attr("idCaja");

  var datos = new FormData();
    datos.append("idCaja", idCaja);
    //console.log("idCaja", idCaja);
    $.ajax({

      url:"ajax/cajas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
        console.log("respuesta", respuesta);      
         $("#idCaja").val(respuesta["id"]);
         $("#cerrarCaja").val(respuesta["num_caja"]);
         $("#cerrarTurno").val(respuesta["turno"]);
         $("#cerrarTurno").html(respuesta["turno"]);
         $("#cerrarUsuario").val(respuesta["usuario"]);

      }

    })

})