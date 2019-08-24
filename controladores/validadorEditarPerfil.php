<?php
session_start();
if ($_SESSION["logueado"] == true){

  $error = (); // creo un array que me guarde los mensajes de error
  $nuevosdatos = (); // guardo el/los dato/s a editar para enviar array como parametro

  if ($_SERVER["REQUEST_METHOD"]=="POST") { // si se completo el formulario

    $cantIngresados = 0;

    // verifico que el nombre cumpla
    if (!empty( )) {
      $cantIngresados++;
      if ( ){ 
        $error[]="Nombre incorrecto."; // si no cumple: guardo el error en el array
      }
      else {
        $nuevosdatos["nombre"] = ;
      }
    } 
    // verifico que el apellido cumpla
    if (!empty( )) {
      $cantIngresados++;
      if ( ){ 
        $error[]="Apellido incorrecto.";
      }
      else {
        $nuevosdatos["apellido"] = ;
      }
    }

    // verifico que el email cumpla
    if (!empty( )) {
      $cantIngresados++;
      if ( ){ 
        $error[]="Email incorrecto.";
      }
      else {
        $nuevosdatos["email"] =  ;
      }
    }

    if ($imagenSubida == 1){
      $nuevosdatos["foto_contenido"] = $contents;
      $nuevosdatos["foto_tipo"] = $tipo_imagen;
      $cantIngresados++;
    }

    if ($cantIngresados > 0) {
      $_SESSION["errores"] = $error;
      // si el array de errores esta vacio, entonces direcciono a la pagina principal
      if (sizeof($error)==0) {
        //hay que crear el usuario e ir a la pagina principal
        
  
        $bd-> ;

        if ( )) {
          $_SESSION["nombre"] = ;
        }
        if ( )) {
          $_SESSION["apellido"] = ;
        }
        if ( )) {
          $_SESSION["mail"] = ;
        }
  
        header('Location: '."../principal.php");
        die();
      }
      else {
        header('Location: '."../editar-perfil.php");
        die();
      }
    }
    else {
      $_SESSION["errores"] = array("No ha ingresado ningun dato para actualizar.");
      header('Location: '."../editar-perfil.php");
      die();
    }
  }
  else {
    // tendria que hacer algo raro para que no sea un POST, pero por si acaso..
    $_SESSION["errores"] = array("No seas malo");
    header('Location: '."../editar-perfil.php");
    die();
  }
}
else {
  $_SESSION["errores"] = array("Sesion no iniciada.");
  header('Location: '."../index.php");
  die();
}
?>