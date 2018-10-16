<?php

class Tipo{
	private $id;
	private $descripcion;

	function __construct($id,$descripcion){
		$this->id = $id;
		$this->descripcion = $descripcion;
	}

	public function getId(){
		return $this->id;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}
}