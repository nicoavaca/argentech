<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=argentech",
			            "root",
			            12345678);

		$link->exec("set names utf8");

		return $link;

	}

}