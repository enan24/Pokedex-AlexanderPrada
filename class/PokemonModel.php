<?php 

require_once('ConexionMysql.php');
require_once('Pokemon.php');

class PokemonModel{
	const TABLA = 'pokemon';
	private $conexion;
	private $filasDeLaTabla;

	public function __construct(){
		$this->conectar();
		$this->setFilasDeLaTabla($this->conexion->getNumeroDeRegistros(self::TABLA));
		$this->desconectar();
	}

	public function getContenidoDeLaTabla(){
		$matriz = array();
		$contador = 0;
		
		$this->conectar();
		$query = "SELECT p.imgurl,p.nombre,t.descripcion 
				  FROM ".self::TABLA." AS p JOIN 
				  tipo as t on t.id = p.tipo_id";
		$this->conexion->setConsulta($query);
		$this->conexion->Consulta();
		$resultadoTabla = $this->conexion->getTabla();
		$this->desconectar();
		while($registro = $resultadoTabla->fetch_assoc()){
			$pokemon = new Pokemon();
			$pokemon->setImgUrl($registro['imgurl']);
			$pokemon->setNombre($registro['nombre']);
			$pokemon->setTipo($registro['descripcion']);
			$matriz[$contador] = $pokemon;
			$contador++;
		}
		return $matriz;
	}

	public function getContenidoPaginado($indice){
		$matriz = array();
		$contador = 0;
		$this->conectar();
		$query = "SELECT p.imgurl,p.nombre,t.descripcion FROM ".self::TABLA." AS p JOIN 
				  tipo as t on t.id = p.tipo_id LIMIT $indice,3";
		$this->conexion->setConsulta($query);
		$this->conexion->consulta();
		$resultadoTabla = $this->conexion->getTabla();
		$this->desconectar();
		while($registro = $resultadoTabla->fetch_assoc()){
			$pokemon = new Pokemon();
			$pokemon->setImgUrl($registro['imgurl']);
			$pokemon->setNombre($registro['nombre']);
			$pokemon->setTipo($registro['descripcion']);
			$matriz[$contador] = $pokemon;
			$contador++;
		}
		return $matriz;
	}

	private function setFilasDeLaTabla($filasDeLaTabla){
		$this->filasDeLaTabla = $filasDeLaTabla;
	}

	public function getFilasDeLaTabla(){
		return $this->filasDeLaTabla;
	}

	private function conectar(){
		$this->conexion = new Conexion();
	}

	private function desconectar(){
		$this->conexion->cerrar();
	}

	public function modificarRegistro($imgurl, $nombre, $tipo, $indice){
		
		$this->conectar();
		$id_tipo = $this->obtenerTipoId($tipo);
		$this->conexion->setConsulta(" UPDATE ".self::TABLA." SET imgurl = '$imgurl' , nombre = '$nombre', tipo_id = '$id_tipo' WHERE nombre = '$indice' ");
		$this->conexion->update();
		$this->desconectar();
	}

	public function eliminarRegistro($campo, $valor){
		$this->conectar();
		$this->conexion->setConsulta("DELETE FROM ".self::TABLA." WHERE $campo='$valor'");
		$this->conexion->delete();
		$this->desconectar();
	}

	public function agregarRegistro($urlImg, $nombre, $tipo){
		$this->conectar();

		$subconsulta = "SELECT id FROM tipo WHERE descripcion = '$tipo'";
		$this->conexion->setConsulta($subconsulta);
		$this->conexion->Consulta();
		$resultadoTabla = $this->conexion->getTabla();
		$registro = $resultadoTabla->fetch_assoc();
		$id_tipo = $registro['id'];
		
		$this->conexion->setConsulta("INSERT INTO ".self::TABLA." (imgurl,nombre,tipo_id) VALUES ('$urlImg','$nombre','$id_tipo')");
		$this->conexion->insert();
		$this->desconectar();
	}

	private function obtenerTipoId($tipo){
		$subconsulta = "SELECT id FROM tipo WHERE descripcion = '$tipo'";
		$this->conexion->setConsulta($subconsulta);
		$this->conexion->Consulta();
		$resultadoTabla = $this->conexion->getTabla();
		$registro = $resultadoTabla->fetch_assoc();

		return  $registro['id'];
	}

	public function buscarPokemon($nombre){
		$resultado = array();
		$this->conectar();
		$query = "SELECT p.imgurl,p.nombre,t.descripcion 
				  FROM ".self::TABLA." AS p JOIN 
				  tipo as t on t.id = p.tipo_id
				  WHERE nombre='$nombre'";
		$this->conexion->setConsulta($query);
		$this->conexion->Consulta();
		$resultadoTabla = $this->conexion->getTabla();
		$this->desconectar();
		if($this->conexion->getCantidadDeRegistros() == 1 ){
			$registro = $resultadoTabla->fetch_assoc();
			$resultado = new Pokemon();
			$resultado->setImgUrl($registro['imgurl']);
			$resultado->setNombre($registro['nombre']);
			$resultado->setTipo($registro['descripcion']);

		}
		return $resultado;
	}

}