<?php
session_start();
if ($_SESSION["logueado"] == true){

  $error = array(); // creo un array que me guarde los mensajes de error

  if ($_SERVER["REQUEST_METHOD"]=="POST") { // si se completo el formulario
    
    $cantIngresados = 0; // cuento cuantos "campos" se completaron. (distinto a sizeof(error[]), xq eso indica cuantos se completaron en forma valida)

    // verifico que la contraseña actual cumpla
    if (!empty($_POST["passwordActual"])) {
      $cantIngresados++;
      if (!$validador->validarContrasenias($_POST["passwordActual"],$_POST["passwordActual"])){ // aca no tendria que usar esta funcion pero me daba paja y la usé igual xq sirve (ver que paso dos veces el mismo parametro, solo para q ande la funcion)
        $error[]="Contraseña invalida.";
      } else {
        $bd = ;
        try{ // ESTE TRY-CATCH ESTA AL RE PEDO. ES XQ EN EL ENUNCIADO NOS PEDIAN PONER UNA EXCEPCION EN ALGUN LADO.
         
          // IGUALMENTE ACA HAY UNA LINEA QUE ES NECESARIA (el try-catch casi siempre ejecuta esta linea, por eso es al pedo el trycatch).

        }
        catch (Exception $e) {
            $error[]=$e->getMessage();
        }
      }
    
      // la contraseña nueva debe estar ingresada las dos veces
      if (!empty($_POST["password1"]) && !empty($_POST["password2"])) {
        $cantIngresados++;
        if ( ) {
          if ( ){ 
            $error[]="Contraseñas incorrectas.";
          }
          else {
            $nuevapass["contrasenia"] = $_POST["password1"];
          }
        }
        else {
          $error[] = "La contraseña nueva igual a la anterior.";
        }
      }
      else {
        $error[] = "Debe ingresar dos veces la nueva contraseña.";
      }
    }

    if ($cantIngresados > 0) {
      $_SESSION["errores"] = $error;
      if (sizeof($error)==0) {
        $bd = new BaseDeDatos($conn);
  
        $bd-> ;
  
        header('Location: ../'."editar-perfil.php");
        die();
      }
      else {
        header('Location: ../'."editarContrasenia.php");
        die();
      }
    }
    else {
      $_SESSION["errores"] = array("No ha ingresado ningun dato para actualizar.");
      header('Location: ../'."editarContrasenia.php");
      die();
    }
  }
  else {
    // tendria que hacer algo raro para que no sea un POST, pero por si acaso..
    $_SESSION["errores"] = array("No seas malo");
    header('Location: ../'."editarContrasenia.php");
    die();
  }
}
else {
  $_SESSION["errores"] = array("Sesion no iniciada.");
  header('Location: ../'."index.php");
  die();
}
?>