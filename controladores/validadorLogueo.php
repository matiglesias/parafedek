<?php
session_start();
if ($_SESSION["logueado"] == false){

  if ($_SERVER["REQUEST_METHOD"]=="POST"){ // si se completo el formulario


    // verifico que el nombre de usuario cumpla
    if ( ){
      $bd = new BaseDeDatos($conn);
      $existe = $bd->getUser($_POST["username"]);

      if ($existe[0]){
        // verifico que la contrasenia cumpla
        $pass = $_POST["password"];
        $user = $_POST["username"];
        try{
          if ( ) {
            $_SESSION["logueado"] = true;

            $_SESSION["usuario"] = ; // guarda el nombre de usuario en la session
            $_SESSION["id"] = ; //guardo el id del usuario en la session
            $_SESSION["nombre"] =  ; //guardo el nombre del usuario
            $_SESSION["apellido"]= ; // guardo el apellido del usuario
            $_SESSION["mail"]= ; //guardo el mail del usuario
            header('Location: '."../principal.php");
            die();
          }
        }catch (Exception $e){
          $error[]=$e->getMessage();
        }
      }
    }
    // por seguridad no debo decirle que es lo que esta mal
    $_SESSION["errores"] = array("Usuario o contraseña incorrectos.");
    header('Location: '."../index.php");
    die();
  }
}
else {
  $_SESSION["errores"] = array("Sesion ya iniciada.");
  header('Location: '."../index.php");
  die();
}
?>