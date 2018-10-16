<?php

class Pokemon{
	private $imgUrl;
	private $nombre;
	private $tipo;

	public function setImgUrl($imgUrl){
		$this->imgUrl = $imgUrl;
	}

	public function getImgUrl(){
		return $this->imgUrl;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setTipo($tipo){
		$this->tipo = $tipo;
	}

	public function getTipo(){
		return $this->tipo;
	}
}