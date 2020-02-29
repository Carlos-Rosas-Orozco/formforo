<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>consulta</title>    
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
    <meta name="title" content="consulta">
    <meta name="description" content="Descripción de la WEB">    
    <link rel="stylesheet" type="text/css" href="css/stconsulta.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
  </head>  
  <body> 
    <header>
       <h3>Consulta</h3>      
    </header>
        <?php
            include "consultaLista.php";
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
                            <td><?php echo $fila['valponencia'];  ?></td>
                            <td>
                            <div>
                                <form action="consulta.php" method="POST">

                                     <input type="hidden" name="IdeAsistente[]" value="<?php echo $fila['IdeAsistente'] ?> "> 
                                     <input type="text" name="comentario" value="<?php echo $fila['nombre'] ?> "> 
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