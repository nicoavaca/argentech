<?php

class ControladorCajas{

	/*=============================================
	CREAR CAJAS
	=============================================*/

	static public function ctrCrearCaja(){

		if(isset($_POST["nuevaCaja"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevaCaja"]) &&
			   //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTurno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEstado"])){

				$tabla = "cajas";

				/*=============================================
				REGISTRAR FECHA DE APERTURA
				=============================================*/

						date_default_timezone_set('America/Argentina/Salta');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

				$datos = array("num_caja"=>$_POST["nuevaCaja"],
					           "turno"=>$_POST["nuevoTurno"],
					           "estado"=>$_POST["nuevoEstado"],
					           "usuario"=>$_SESSION["nombre"],
					           "f_abierta"=>$fechaActual);

				$respuesta = ModeloCajas::mdlIngresarCaja($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La caja ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cajas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La caja no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cajas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	CerraR CAJAS
	=============================================*/

	static public function ctrCrearCaja2(){

		if(isset($_POST["nuevaCaja2"])){

			if(preg_match('/^[0-9]+$/', $_POST["nuevaCaja2"]) &&
			   //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTurno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEstado2"])){

				$tabla = "cajas";

				/*=============================================
				REGISTRAR FECHA DE CIERRE
				=============================================*/

						date_default_timezone_set('America/Argentina/Salta');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

				$datos = array("num_caja"=>$_POST["nuevaCaja2"],
					           "turno"=>$_POST["nuevoTurno2"],
					           "estado"=>$_POST["nuevoEstado2"],
					           "usuario"=>$_SESSION["nombre"],
					           "f_cerrada"=>$fechaActual);

				$respuesta = ModeloCajas::mdlIngresarCaja2($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La caja ha sido cerrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cajas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La caja no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cajas";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR CAJAS
	=============================================*/

	static public function ctrMostrarCajas($item, $valor){

		$tabla = "cajas";

		$respuesta = ModeloCajas::mdlMostrarCajas($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR numeros CAJAS
	=============================================*/

	static public function ctrMostrarNumCajas(){

		$tabla = "cajas";

		$respuesta = ModeloCajas::mdlMostrarNumCajas($tabla);

		return $respuesta;
	
	}

	/*=============================================
	APERTURA CAJAS
	=============================================*/

	static public function ctrMostrarAbiertas(){

		$tabla = "cajas";


		$respuesta = ModeloCajas::mdlMostrarAbiertas($tabla);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CAjA
	=============================================*/

	static public function ctrEditarCaja(){

		if(isset($_POST["editarCaja"])){

			if(preg_match('/^[0-9]+$/', $_POST["editarCaja"]) &&
			   //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTurno"])&&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEstado"])){

				/*preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTurno"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){*/

			   	$_SESSION['idCaja'] = $_POST["idCaja"];
				$tabla = "cajas";

				/*date_default_timezone_set('America/Argentina/Salta');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;*/

				$datos = array("num_caja"=>$_POST["editarCaja"],
							   "turno" => $_POST["editarTurno"],
							   "estado" => $_POST["editarEstado"],
							   "f_abierta" => $_POST["editarFechaA"]);


				$respuesta = ModeloCajas::mdlEditarCaja($tabla, $datos);

				if($respuesta == "ok"){
					//cho "fechaA".$_POST["editarFechaA"]." estado ".$_POST["editarEstado"];
					echo'<script>

					swal({
						  type: "success",
						  title: "La caja ha sido cambiada correctamente '.$_POST["editarCaja"].' '.$_POST["editarTurno"].' '.$_POST["editarEstado"].' '.$_POST["editarFechaA"].' '.$_POST["id"].'",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cajas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La caja no puede ir vacía o llevar caracteres especiales no se pudo actualizar!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cajas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CAjA
	=============================================*/

	static public function ctrBorrarCaja(){

		if(isset($_GET["idCaja"])){

			$tabla ="Cajas";
			$datos = $_GET["idCaja"];

			$respuesta = ModeloCajas::mdlBorrarCaja($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La caja ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cajas";

									}
								})

					</script>';
			}
		}
		
	}

	/*=============================================
	abrir CAjA
	=============================================*/

	static public function ctrAbrirCaja(){

		if(isset($_POST["abrirCaja"])){

			if(preg_match('/^[0-9]+$/', $_POST["abrirCaja"])
			   //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTurno"])&&
			   //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEstado"])
			){

				$tabla = "cajas";

				/*date_default_timezone_set('America/Argentina/Salta');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;*/

				/*$datos = array("num_caja"=>$_POST["abrirCaja"],
							   "turno" => $_POST["abrirTurno"],
							   //"estado" => $_POST["editarEstado"],
							   "f_abierta" => $_POST["abrirFechaA"]);*/
				  $datos = $_POST["abrirFechaA"];


				$respuesta = ModeloCajas::mdlAbrirCaja($tabla, $datos);

				if($respuesta == "ok"){
					
					echo'<script>

					swal({
						  type: "success",
						  title: "La caja ha sido Abierta correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cajas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La caja no puede Abrir ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cajas";

							}
						})

			  	</script>';

			}

		}

	}

	/*static public function ctrAbrirCaja(){

		if(isset($_GET["idCaja"])){

			$tabla ="Cajas";
			//$datos = $_GET["idCaja"];
			date_default_timezone_set('America/Argentina/Salta');

			$fecha = date('Y-m-d');
			$hora = date('H:i:s');

			$fechaActual = $fecha.' '.$hora;
			$datos = array(//"num_caja"=>$_POST["editarCaja"],
							   //"turno" => $_POST["editarTurno"],
							   //"estado" => $_POST["editarEstado"],
							   "f_abierta" => $fechaActual );
			$respuesta = ModeloCajas::mdlAbrirCaja($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La caja ha sido Abierta correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cajas";

									}
								})

					</script>';
			}
		}
		
	}*/

	/*=============================================
	CERRAR CAjA
	=============================================*/

	static public function ctrCerrarCaja(){

		if(isset($_GET["idCaja"])){

			if(preg_match('/^[0-9]+$/', $_POST["cerrarCaja"])
			   //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTurno"])&&
			   //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEstado"])
			){

				$tabla = "cajas";

				/*date_default_timezone_set('America/Argentina/Salta');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;*/

				$datos = array("num_caja"=>$_POST["cerrarCaja"],
							   "turno" => $_POST["cerrarTurno"],
							   //"estado" => $_POST["editarEstado"],
							   "f_cerrada" => $_POST["cerrarFechaC"]);


				$respuesta = ModeloCajas::mdlCerrarCaja($tabla, $datos);

				if($respuesta == "ok"){
					
					echo'<script>

					swal({
						  type: "success",
						  title: "La caja ha sido Cerrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cajas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La caja no puede Cerrar e ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cajas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	CONTROL CAJAS abiertas
	=============================================*/

	static public function ctrControlAbiertas(){

		$tabla = "cajas";


		$respuesta = ModeloCajas::mdlControlAbiertas($tabla);

		return $respuesta;
	
	}

	/*=============================================
	CONTROL CAJAS CERRADAS
	=============================================*/

	static public function ctrControlCerradas(){

		$tabla = "cajas";


		$respuesta = ModeloCajas::mdlControlCerradas($tabla);

		return $respuesta;
	
	}
}
