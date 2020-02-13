<?php

function enviarCorreo(){
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
global $consulta;
mysqli_select_db($con, 'formforo');

$correo = 'select nombre from asistencia where email = "'.$email.'" ';
$datos = mysqli_query($con,$correo);   
return $datos; 
 
}
?>