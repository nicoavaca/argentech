<?php

/*
require_once: En cambio, require_once se asegura de que un archivo se incluya solo una vez. 
Si el mismo archivo se intenta incluir nuevamente después de haber
sido incluido previamente, PHP lo ignorará. Esto es útil para evitar problemas 
como la redefinición de funciones o la redeclaración de clases.
*/

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

	/*
	EDITAR CATEGORÍA
	*/	

	public $idCategoria;

	public function ajaxEditarCategoria(){

		$item = "id";
		$valor = $this->idCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		echo json_encode($respuesta);

	}
}

/*
EDITAR CATEGORÍA
*/	
if(isset($_POST["idCategoria"])){

	$categoria = new AjaxCategorias();
	$categoria -> idCategoria = $_POST["idCategoria"];
	$categoria -> ajaxEditarCategoria();
}
