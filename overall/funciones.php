<?php

function verificarPokemon($tabla,$nombrePokemon){
	$resultado = 0;
	foreach($tabla as $registro){
		if(strtolower($registro->getNombre()) == strtolower($nombrePokemon))
			$resultado = 1;
	}
	return $resultado;
}


function verificarImagen($file){
	$respuesta = ($file["error"] > 0) ? false : true;
	return $respuesta;
 }

 function imagenVacia($imagen){
	return ($imagen['tmp_name'] == "") ? 1 : 0;
 }