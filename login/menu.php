<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Completar registro</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
</head>
<body>
<h1>Bienvenido</h1>
<?php
    include("p_login.php");
    $correo = enviarCorreo();
?>
<table class="table">
    <thead class="thead-dark" >
        <tr> 
            <th width= "100"> nombre </th>
        </tr>
    </thead>
         <tbody>
            <?php
            while($fila = mysqli_fetch_array($correo)){
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

