<?php

/*function login(){
$servername = "localhost";
//$username = "upncolim_asisten";
//$password = "l1nkacces0";
$database = "formforo";
$username = "root";
$password = "";
$correo = $_POST['email'];
$numero = $_POST['telefono'];

$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
$sql = "select nombre from asistencia where email = '.$correo.' and telefono = '.$numero.'";

if (mysqli_query($conn, $sql)) {
    echo "<center><H1>Datos encontrados</H1></center>";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}*/


?>