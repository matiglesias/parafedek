<?php
	session_start();
    include ("../BD.php");
    include ("../baseDeDatos.php");

    $idUsuario = ;
    $idMensaje = ;  
    $mg = ;  

    $bd = ;

    if ($mg==0) {
    	$bd -> darMeGusta($idUsuario,$idMensaje);
    }else{
      
    }    

    header('Location: '."../principal.php");
?>