<?php
  session_start(); //inicio la sesion 
  if (){ //verifico si el usuario esta logueado puede ver la vista
      header('Location: '."index.php"); // si no esta logueado lo redirecciona al index
  }



  $info = new otroPerfil($conn);
  $nombreAp = ;
  $nombreUsuario = ;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <title>The Wall - Perfil</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/css/layout.css" type="text/css">
    <link rel="stylesheet" href="style/css/profile.css" type="text/css">
    <link rel="stylesheet" href="style/css/tables.css" type="text/css">
    <link rel="stylesheet" href="style/css/pagination.css" type="text/css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="style/js/codigoJS.js"></script>

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
            <li><div class="dropdown">
                <a>Perfil</a>
                <div class="dropdown-content">
                <a href="perfil.php">Mi Perfil</a>
                <a href="editar-perfil.php">Editar Perfil</a>
                <a href="logout.php">Cerrar Sesión</a>
                </div>
                </div>
              </li>
            <li>
              <form action="" method="post"> <!-- buscar -->
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

    <!-- seccion 2 -->
    <div class="section row2">
      <div id="container">
        <br>
        <h1 class="title-pen"> Perfil del usuario</h1>
        <br>
        <div class="user-profile">
          <img class="avatar" src="mostrarImagen.php?id= &view=1" />
          <div class="name"><?php echo $nombreAp; ?></div>
          <div class="username">@<?php echo $nombreUsuario; ?></div>
          <br>
          <?php
            $usuario = ;
            if ($usuario -> )){
              echo "<div class='input'><a href='controladores/.php?idOtroUsuario=".."'>Dejar de Seguir</a></div>";
            }
            else {
              echo "<div class='input'><a href='controladores/.php?idOtroUsuario=".."'>Seguir</a></div>";
            }
          ?>
        </div>
        <br>
        <br>
        <table align="center">
          <tr>
            <td>
              <table id="tablas">
                <tr>
                  <th>Imagen</th>
                  <th>Mensaje</th>
                  <th>Fecha - Hora</th>
                  <th></th>
                </tr>
                <tr>
                <?php    
                    if (!empty($_GET["pag"])) {
                      $mensajes = $info -> getUltimosMensajes($_GET["id"],$_GET['pag']);
                    }else{
                      $mensajes = $info -> getUltimosMensajes($_GET["id"],'0');
                    }
                    for ($i=0; $i <  ; $i++) { 
                    echo "<tr>";
                    echo "<td><img src='mostrarImagen.php?id= &view=0'/></td>";
                    echo "<td> </td>"; // mensaje
                    echo "<td> </td>"; // fecha y hora                 
                    $cant = ; //le paso id del mensaje
                    if ( ) { 
                      echo "<td><a href='controladores/darMeGusta.php?idMensaje=&mg=1'><i class='fas fa-thumbs-up'></i>" .  . "</a></td>";
                    }else{
                      echo "<td><a href='controladores/darMeGusta.php?idMensaje=&mg=0'><i class='far fa-thumbs-up'></i>" .  . "</a></td>";
                    }
                  } ?>
                </tr>
              </table>
            </td>

          </tr>
        </table>
        <br>
        <div style="text-align: right;">
          <div class="pagination">
            <?php   // paginacion de las publicaciones. ACA NO HAY NINGUN ERROR XQ NI YO SE COMO FUNCIONA .
              $cantTotal = $info ->cantidadMensajesMostrar($_GET["id"]);
              $cantPaginas = $cantTotal / 10;
              for ($i=0; $i <$cantPaginas ; $i++) { 
                if (!empty($_GET["pag"]) and ($_GET['pag']) == $i){
                  echo "<a class='active' href='otroPerfil.php?id=".$_GET["id"]."&pag=".$i."'>".$i."</a>";
                }else{
                  if ($i == 0) {
                    echo "<a class='active' href='otroPerfil.php?id=".$_GET["id"]."'>".$i."</a>";
                  }else{
                    echo "<a href='otroPerfil.php?id=".$_GET["id"]."&pag=".$i."'>".$i."</a>";                 
                  }
                  
                }                
              }
            ?>
          </div>
        </div>
        <br>
      </div>
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