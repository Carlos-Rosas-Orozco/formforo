<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>consulta</title>    
    <meta charset="UTF-8">
    <meta name="title" content="consulta">
    <meta name="description" content="Descripción de la WEB">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
  </head>  
  <body>    
    <header>
      <h1>Consulta de usuarios, archivo word e imagen</h1>      
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
                $sql = 'select IdeAsistente, nombre, perfil, institucion, ciudad, telefono, email, taller, destino, destino_imagen, destino_txt from asistencia';
                $datos = mysqli_query($conn, $sql);
                return $datos;
            }
            //$con=conectar();
            $consulta = consultaUsuarios();
        ?>
        
        <h3>Usuarios y archivos</h3>
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
                        </tr>
                        
                    <?php
                     
                }
                ?>
            </tbody>
        </table>
  </body>  
</html>