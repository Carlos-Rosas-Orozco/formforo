<?php
function consultaUsuarios(){
    $user= "root";
    $pass= "colima";
    $server= "localhost";
    $db= "formforo";
    $conn= mysqli_connect($server,$user,$pass) or die ("Error al conectar"); 
    if(!$conn){
        error_log("Error to connect to MySQL" . mysqli_error($conn));
        die('Internal server error');
    }
    global $consulta;
    mysqli_select_db($conn, 'formforo');
    $sql = 'select IdeAsistente, nombre, perfil, institucion, ciudad, telefono, email, taller, destino, destino_imagen, destino_txt, valponencia from asistencia';
    $datos = mysqli_query($conn, $sql);
                
               
    return $datos;
                
}   

$user= "root";
$pass= "colima";
$server= "localhost";            
$con= mysqli_connect($server,$user,$pass) or die ("Error al conectar"); 
if(!$con){
    error_log("Error to connect to MySQL" . mysqli_error($con));
    die('Internal server error');
}
mysqli_select_db($con, 'formforo');

    if(@$_POST["actualizar"]){
        foreach($_POST['IdeAsistente'] as $id){
            $comentario = $_POST["comentario"];
            $sql = 'UPDATE asistencia SET valponencia = "'.$comentario.'" WHERE IdeAsistente = "'.$id.'"';
            $datos = mysqli_query($con, $sql);
        }
    }
 
?>