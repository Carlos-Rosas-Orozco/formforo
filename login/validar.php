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
$email=$_POST['email'];
session_start();
$_SESSION['email'] = $email;
header("Location:menu.php")
?>