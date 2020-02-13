<?php

$email = $_POST['email'];
$telefono = $_POST['telefono'];
$user= "root";
$pass= "";
$server= "localhost";
$db= "formforo";
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$con= mysqli_connect($server,$user,$pass) or die ("Error al conectar"); 
if(!$con){
    error_log("Error to connect to MySQL" . mysqli_error($con));
    die('Internal server error');
}
mysqli_select_db($con, 'formforo');

$sql = "SELECT nombre FROM asistencia WHERE email = '$email' AND telefono = '$telefono'";
$datos = mysqli_query($con,$sql);

$filas = mysqli_num_rows($datos);

if($filas>0){
    header("location:menu.php");
}
else{
    echo "error en la autentificación";
}


?>