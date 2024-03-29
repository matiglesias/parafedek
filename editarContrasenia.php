<?php
  session_start();
  if ( ) {
    header('Location: '."index.php");
    die();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <title>The Wall - Editar perfil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/css/layout.css" type="text/css">
    <link rel="stylesheet" href="style/css/profile.css" type="text/css">
    <link rel="stylesheet" href="style/css/tables.css" type="text/css">
    <link rel="stylesheet" href="style/css/pagination.css" type="text/css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  </head>

  <body>
    <!-- seccion 1 -->
    <div class="section row1">
      <header id="header">
        <div id="hgroup">
          <img src="style/images/logo.png" />
          <h1><a href="principal.php">The Wall</a></h1> <!-- titulo -->
          <h2>Nueva red social - Conecta con tus amigos!</h2> <!-- subtitulo -->
        </div>
        <nav> <!-- menu con los links -->
          <ul>
            <li><a href="principal.php">Inicio</a></li>
            <li>
              <div class="dropdown">
                <a>Perfil</a>
                <div class="dropdown-content">
                <a href="perfil.php">Mi Perfil</a>
                <a href="editar-perfil.php">Editar Perfil</a>
                <a href="logout.php">Cerrar Sesión</a>
                </div>
              </div>
            </li>
            <li>
              <form action=" " method="post"> <!-- buscar -->
                <fieldset>
                  <input type="text" name="buscar" value="">
                  <input type="submit" id="b_submit" value="Buscar">
                </fieldset>
              </form>
            </li>
          </ul>
        </nav>
      </header>
    </div> <!-- fin seccion 1 -->
    <div style="color: red; text-align:center;"> 

    <!-- ERRORES -->
    <div style="color: red; text-align:center;"> 
      <?php
        //recorro el array de errores para devolver si hay algun campo mal ingresado
        if (!empty($_SESSION["errores"])){
          $error = $_SESSION["errores"];
          for ($i=0; $i < sizeof($error) ; $i++) { 
            echo $error[$i]."<br>";
          }
          unset($_SESSION["errores"]);
        }    
         
      ?> 
    </div>

    <!-- seccion 2 -->
    <div class="section row2">
      <div id="container" align="center">

        <br>
          <form id="regform" style="border: 0px;" method="POST" action=" " onsubmit="return(editarPass())" enctype="multipart/form-data"><!-- para subir imagen -->
            <h1 class="title-pen">Modificar contraseña</h1></h2>

            <div class="formfield">
              <label for="password1"><b>Contraseña actual</b></label>
              <input type="password" name="passwordActual" id="passwordActual">
            </div>

            <div class="formfield">
              <label for="password1"><b>Nueva contraseña</b></label>
              <input type="password" name="password1" id="password1">
            </div>

            <div class="formfield">
              <label for="password2"><b>Repita su contraseña nueva</b></label>
              <input type="password" name="password2" id="password2">
            </div>

            <button name="savechanges" id="regbutton" type="submit">Guardar cambios</button>
          </form>
        <br>

      </div>
      <br>
    </div> <!-- fin seccion 2 -->

    <!-- seccion 3 - footer -->
    <div class="section row3">
      <footer id="footer">
        <p class="fo_left">Hecho por: Iglesias Matias - Lanciotti Julieta</p>
        <p class="fo_right">Seminario PHP 2019 </p>
      </footer>
    </div>

  </body>
</html>