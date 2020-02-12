<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>Agregar archivos</title>    
    <meta charset="UTF-8">
    <meta name="title" content="consulta">
    <meta name="description" content="Descripción de la WEB">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
  </head>  
  <body>    
    <header>
      <h1>Agregar archivos faltantes</h1>      
    </header>
        <?php
            function consultaUsuarios(){
                $user= "root";
                $pass= "";
                $server= "localhost";
                $db= "formforo";
                $correo = $_POST['email'];
                $numero = $_POST['telefono'];
                $conn= mysqli_connect($server,$user,$pass) or die ("Error al conectar"); 
                if(!$conn){
                    error_log("Error to connect to MySQL" . mysqli_error($conn));
                    die('Internal server error');
                }
                global $consulta;
                mysqli_select_db($conn, 'formforo');
                $sql = "select nombre from asistencia where email = '.$correo.' and telefono = '.$numero.'";
                $datos = mysqli_query($conn, $sql);
                return $datos;
            }
            //$con=conectar();
            $consulta = consultaUsuarios();
        ?>
        
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width= "100"> nombre </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fila = mysqli_fetch_array($consulta)){
                    ?>
                        <tr>
                            <td><?php echo $fila['nombre'];  ?></td>
                        </tr>
                        
                    <?php   
                }
                ?>
            </tbody>
        </table>
  </body>  
</html>