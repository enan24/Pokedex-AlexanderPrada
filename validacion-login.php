<?php

require_once('class/AdminModel.php');
$user = new AdminModel();
$userBuscado = $user->buscarAdmin($_POST['user'],$_POST['pass']);
$user->conectarAdmin($userBuscado,(isset($_POST['recordarme']))? 1 : 0 );

