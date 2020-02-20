<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>consulta</title>    
    <meta charset="UTF-8">
    <meta name="title" content="consulta">
    <meta name="description" content="Descripción de la WEB">    
    <link rel="stylesheet" type="text/css" href="css/stconsulta.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
  </head>  
  <body> 
  <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Ver todos los usuarios <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Usuarios validados</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="#">Usuarios sin validar</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>  
    <header>
       <h3>Consulta</h3>      
    </header>
        <?php
            function consultaUsuarios(){
                $user= "root";
                $pass= "";
                $server= "localhost";
                $db= "formforo";
                $conn= mysqli_connect($server,$user,$pass) or die ("Error al conectar"); 
                if(!$conn){
                    error_log("Error to connect to MySQL" . mysqli_error($conn));
                    die('Internal server error');
                }
                global $consulta;
                mysqli_select_db($conn, 'formforo');
                $sql = 'select IdeAsistente, nombre, perfil, institucion, ciudad, telefono, email, taller, destino, destino_imagen, destino_txt from asistencia where valponencia is null';
                $datos = mysqli_query($conn, $sql);
                
                
                return $datos;
                
            }          
            $consulta = consultaUsuarios();
        ?>
        
        <div>
            <div class="row">
                <div class="col-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width= "100"> IdeAsistente </th>
                    <th width= "100"> nombre </th>
                    <th width= "100"> perfil </th>
                    <th width= "100"> institucion </th>
                    <th width= "100"> ciudad </th>
                    <th width= "100"> telefono </th>
                    <th width= "100"> email </th>
                    <th width= "100"> taller </th>
                    <th width= "100"> Descargar archivo </th>
                    <th width= "100"> ver imagen </th>
                    <th width= "100"> ver archivo txt </th>
                    <th width= "100"> validar pago  </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fila = mysqli_fetch_array($consulta)){
                    ?>
                        <tr>
                            <td><?php echo $fila['IdeAsistente'];  ?></td>
                            <td><?php echo $fila['nombre'];  ?></td>
                            <td><?php echo $fila['perfil'];  ?></td>
                            <td><?php echo $fila['institucion'];  ?></td>
                            <td><?php echo $fila['ciudad'];  ?></td>
                            <td><?php echo $fila['telefono'];  ?></td>
                            <td><?php echo $fila['email'];  ?></td>
                            <td><?php echo $fila['taller'];  ?></td>
                            <td><?php echo '<a href="' . $fila['destino'] . ' ">Descargar.</a>';  ?></td>
                            <td><?php echo '<a href="' . $fila['destino_imagen'] . ' ">Ver.</a>';  ?></td>
                            <td><?php echo '<a href="' . $fila['destino_txt'] . ' ">Archivo txt.</a>';  ?></td>
                            <td>
                            <div>
                                <form action="consultaLista.php" method="POST">

                                     <input type="checkbox" name="IdeAsistente[]"  value="<?php echo $fila['IdeAsistente'] ?> "> 
                                     <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="actualizar" value="Guardar">
                    
                                </form>
                            </div> 
                        </td>
                        </tr>
                    <?php                
                }
                ?>
            </tbody>
        </table>
                </div>
            </div>
        </div>
  </body>  
</html>