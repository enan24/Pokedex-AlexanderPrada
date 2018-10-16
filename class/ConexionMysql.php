<?php

class Conexion extends mysqli{
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $db = "pokemons_alexander_prada";

	private $consulta = "";
	private $tabla = "";

	private $cantidadDeRegistros;

	function __construct(){
		parent::__construct($this->host, $this->user, $this->pass, $this->db);
		parent::set_charset("utf8");
	}

	function setConsulta($consulta){
		$this->consulta = $consulta;
	}

	function Consulta(){
		$this->tabla = parent::query($this->consulta);
		$this->cantidadDeRegistros = mysqli_num_rows($this->tabla);
	}

	function Update(){
		parent::query($this->consulta);
	}

	function Delete(){
		parent::query($this->consulta);
	}

	function Insert(){
		parent::query($this->consulta);
	}

	function getTabla(){
		return $this->tabla;
	}

	function getNumeroDeRegistros($tabla){
		$tabla = parent::query("SELECT * FROM $tabla");
		return mysqli_num_rows($tabla);
	}

	function getCantidadDeRegistros(){
		return $this->cantidadDeRegistros;
	}

	function cerrar(){
		parent::close();
	}
}
