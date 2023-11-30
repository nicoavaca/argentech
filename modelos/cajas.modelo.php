<?php

require_once "conexion.php";

class ModeloCajas{

	/*=============================================
	CREAR CAjA
	=============================================*/

	static public function mdlIngresarCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(num_caja, turno, estado, usuario, f_abierta) VALUES (:num_caja, :turno, :estado, :usuario, :f_abierta)");

		$stmt->bindParam(":num_caja", $datos["num_caja"], PDO::PARAM_INT);

		/* 
		PDO::PARAM_STR: Indica el tipo de datos del parámetro. En este caso,
		se especifica que el parámetro es una cadena de caracteres (string). Esto es útil para garantizar que los datos 
		se traten de la manera adecuada y se eviten posibles problemas de seguridad relacionados con la inyección de SQL. 
		
		Si les cuesta entender por las dudas esto hace que llegue los datos sin problemas desde la BD
		*/

		$stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":f_abierta", $datos["f_abierta"], PDO::PARAM_STR);
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	CERRAR CAjA
	=============================================*/

	static public function mdlIngresarCaja2($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(num_caja, turno, estado, usuario, f_cerrada) VALUES (:num_caja, :turno, :estado, :usuario, :f_cerrada)");

		$stmt->bindParam(":num_caja", $datos["num_caja"], PDO::PARAM_INT);
		$stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":f_cerrada", $datos["f_cerrada"], PDO::PARAM_STR);
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CAJAS
	=============================================*/

	static public function mdlMostrarCajas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR NÚMEROS DE CAJAS
	=============================================*/

	static public function mdlMostrarNumCajas($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT DISTINCT num_caja FROM $tabla ORDER BY num_caja ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CAJA
	=============================================*/

	static public function mdlEditarCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  num_caja = :num_caja, turno = :turno, estado = :estado/*, f_abierta = :f_abierta*/ WHERE id = :id");

		
		$stmt->bindParam(":num_caja", $datos["num_caja"], PDO::PARAM_INT);
		$stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		//$stmt->bindParam(":f_abierta", $datos["f_abierta"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CAjA
	=============================================*/

	static public function mdlBorrarCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	MOSTRAR CAJAS ABIERTAS
	=============================================*/

	static public function mdlMostrarAbiertas($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT  id, num_caja, turno, estado, f_cerrada, usuario FROM $tabla WHERE estado = 'CERRADA'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CAJA apertura
	=============================================*/

	static public function mdlAbrirCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET /*num_caja = :num_caja, turno = :turno,*/
			f_abierta = :f_abierta, /*f_cerrada = null*/ WHERE id = :id");

		
		/*$stmt->bindParam(":num_caja", $datos["num_caja"], PDO::PARAM_INT);
		$stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
		//$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);*/
		$stmt->bindParam(":f_abierta", $datos["f_abierta"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR CAJA cierre
	=============================================*/

	static public function mdlCerrarCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET num_caja = :num_caja, turno = :turno/*,
			f_abierta = null*/, f_cerrada = :f_cerrada WHERE id = :id");

		
		$stmt->bindParam(":num_caja", $datos["num_caja"], PDO::PARAM_INT);
		$stmt->bindParam(":turno", $datos["turno"], PDO::PARAM_STR);
		//$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":f_cerrada", $datos["f_cerrada"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	CONTROL CAJAS ABIERTAS
	=============================================*/

	static public function mdlControlAbiertas($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT  f_cerrada FROM $tabla WHERE estado = 'CERRADA' and str_to_date(f_cerrada,'%Y-%m-%d') = str_to_date(sysdate(),'%Y-%m-%d')");

			$stmt -> execute();

			return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	CONTROL CAJAS CERRADAS
	=============================================*/

	static public function mdlControlCerradas($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT  f_abierta FROM $tabla WHERE estado = 'ABIERTA' and str_to_date(f_abierta,'%Y-%m-%d') = str_to_date(sysdate(),'%Y-%m-%d')");

			$stmt -> execute();

			return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

}
