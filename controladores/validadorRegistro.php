<?php
session_start();
if ($_SESSION["logueado"] == true){


  $error = array(); // creo un array que me guarde los mensajes de error

  if($_SERVER["REQUEST_METHOD"]=="POST"){ // si se completo el formulario
      // instancio objeto validador

    // verifico que el nombre cumpla
    if (!$validador-> ($_POST["nombre"])){ 
      $error[]="Nombre incorrecto."; // si no cumple: guardo el error en el array
    }
    
    // verifico que el apellido cumpla
    if ( ){ 
      $error[]="Apellido incorrecto.";
    }
    
    // verifico que el email cumpla
    if ( ){ 
      $error[]="Email incorrecto.";
    }

    // verifico que el nombre de usuario cumpla
    if ( ){ 
      $error[]="Nombre de usuario incorrecto.";
    } else {
      //verifico que el usuario no exista en la bd
      $bd = ;
      $existe = $bd->getUser( );
      if($existe[0]){ //si devuelve distinto de 0 o NULL significa que el usuario existe
        $error[]="El nombre de usuario ya esta en uso";
      }
    }

    // verifico que las contrasenias cumplan
    if ( ){ 
      $error[]="Contraseñas incorrectas.";
    }
    
    // si el array de errores esta vacio, entonces direcciono a la pagina principal
    if((sizeof($error)==0) &&($imagenSubida == 1)){ // si el array de los errores no tiene elementos
      //hay que crear el usuario e ir a la pagina principal

      $bd = new BaseDeDatos($conn);

      $bd->newUser( , , , , , , , , , , ,$contents,$tipo_imagen);
      
      //al registrarse correctamente, el usuario tambien inicia sesion
      $_SESSION["logueado"] = true; //indico que inicio sesion
      $_SESSION["usuario"] = ; // guardo el nombre de usuario
      $existe = $bd->getUser( );
      $_SESSION["id"] = $existe[0];
      $_SESSION["nombre"] =  ; //guardo el nombre del usuario
      $_SESSION["apellido"]= ; // guardo el apellido del usuario
      $_SESSION["mail"]= ; //guardo el mail del usuario
      
      header('Location: '."../principal.php");
    } 
    else {
      $_SESSION["errores"] = $error; //guarda los errores en la sesion del usuario para poder usar la variable en la vista
      header('Location: '."../index.php");

    }
  }
}
else {
  $_SESSION["errores"] = array("No se puede registrar estando logueado.");
  header('Location: '."../index.php");
  die();}
?>