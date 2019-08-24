<?php
	session_start();
    include ("../BD.php");
    include ("../baseDeDatos.php");

    $idUsuario = ;
    $idMensaje = ;  

  

    $bd ->eliminarTodosMg($idUsuario,$idMensaje);

    header('Location: '."../perfil.php");
?>