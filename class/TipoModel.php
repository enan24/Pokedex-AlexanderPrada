<?php 

require_once('ConexionMysql.php');
require_once('Tipo.php');

class TipoModel{
	const TABLA = 'tipo';
	private $conexion;
	private $filasDeLaTabla;

	public function __construct(){
	}

	public function getContenidoDeLaTabla(){
		$matriz = array();
		$contador = 0;
		
		$this->conectar();
		$query = "SELECT * FROM ".self::TABLA;
		$this->conexion->setConsulta($query);
		$this->conexion->consulta();
		$resultadoTabla = $this->conexion->getTabla();
		$this->desconectar();
		while($registro = $resultadoTabla->fetch_assoc()){
			$tipo = new Tipo($registro['id'],$registro['descripcion']);
			$matriz[$contador] = $tipo;
			$contador++;
		}
		return $matriz;
	}

	private function conectar(){
		$this->conexion = new Conexion();
	}

	private function desconectar(){
		$this->conexion->cerrar();
	}

}