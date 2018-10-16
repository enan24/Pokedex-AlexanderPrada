<?php

require_once('ConexionMysql.php');
require_once('Admin.php');

class AdminModel{
	const TABLA = 'user';
	private $conexion;

	public function __construct(){
	}

	public function buscarAdmin($nick,$password){
		$result = array();
		$this->conectar();
		$query = "SELECT * FROM ".self::TABLA." WHERE nick='$nick' AND pass='$password'";
		$this->conexion->setConsulta($query);
		$this->conexion->Consulta();
		$resultTable = $this->conexion->getTabla();
		$this->desconectar();

		if($this->conexion->getCantidadDeRegistros() == 1 ){
			$registro = $resultTable->fetch_assoc();
			$result = new Admin($registro['nick'],$registro['password']);
		}
		return $result;
	}

    public function conectarAdmin($user,$activarCookie){
		if(!$this->sessionIniciada()){
			if($user != null ){
				session_start();
				$_SESSION['user'] = $user->getNombre();
				if($activarCookie == 1 ) setcookie("session",$user->getNombre(), time()+20);
				header("location:administracion.php");
			} else header('location:index.php');
		}else header('location:administracion.php');			
	}

	private function sessionIniciada(){
		session_start();
		return (isset($_SESSION['user']))? 1 : 0 ;
	}


	private function conectar(){
		$this->conexion = new Conexion();
	}

	private function desconectar(){
		$this->conexion->cerrar();
	}
}