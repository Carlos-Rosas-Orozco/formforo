<?php
date_default_timezone_set("America/Mexico_City");
$servername = "localhost";
$database = "formforo";
$username = "root";
$password = "";
//$username = "upncolim_asisten";
//$password = "l1nkacces0";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$hora=date("H:i:s");
$fecha=date("Y/m/d");
$nombre = $_POST["nombre"];
$perfil = $_POST["perfil"];
$institucion = $_POST["institucion"];
$ciudad = $_POST["ciudad"];
$telefono = $_POST["telefono"];
$email = $_POST["correo"];
$taller = $_POST["taller_t"];
$destino = "documentos/". $nombre .$_FILES["documento"]["name"];
$destinoImagen = "imagen/".  $nombre .$_FILES["imagen"]["name"];
$destinotxt = "archivotxt/". $nombre . ".txt";
$sql = "INSERT INTO Asistencia (fecha,hora,nombre,perfil,institucion,ciudad,telefono,email,taller,destino,destino_imagen,destino_txt) VALUES ('$fecha','$hora','$nombre','$perfil','$institucion','$ciudad','$telefono','$email','$taller', '$destino', '$destinoImagen','$destinotxt')";

if (mysqli_query($conn, $sql)) {
      echo "<center><H1>¡Datos Guardados Correctamente!</H1></center>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

/*foreach($_FILES["documento"] as $clave => $valor){
     
}*/

//Almacenar Documento de Word INICIA ------------------------------- WORD --------------------------------------
$nombrefinal = $destino.basename($_FILES["documento"]["name"]);
$upload = $destino . $nombrefinal;
$faltante = "documentos/";
$archivo = $_FILES["documento"]["tmp_name"];
$mTipo = mime_content_type($archivo);

if (($mTipo == "application/msword") or ($mTipo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){

if($_FILES["documento"]["type"]){ 
      move_uploaded_file($archivo,$destino);
      echo "Archivo correcto ";
      echo "<br>";

}      
}else{
      echo "Solo se admiten archivos de Word";
      echo "<br>";
}

//Almacenar Documento de Word TERMINA ------------------------------- WORD --------------------------------------


//Almacenar imagen INICIA ------------------------------- IMAGEN --------------------------------------

$nombrefinal_imagen = $destinoImagen.basename($_FILES["imagen"]["name"]);
$upload_imagen = $destinoImagen . $nombrefinal_imagen;
$faltante_imagen = "imagen/";
$archivo_imagen = $_FILES["imagen"]["tmp_name"];
$mTipo_imagen = mime_content_type($archivo_imagen); 

if (($mTipo_imagen == "image/jpeg") or ($mTipo_imagen == "application/pdf") or ($mTipo_imagen == "image/png")){
if($_FILES["imagen"]["type"]){
      move_uploaded_file($archivo_imagen,$destinoImagen);
      echo "Archivo correcto";
      echo "<br>";

}       
}else{
      echo "Solo se admiten imagenes en formato pdf, png o jpg ";
      echo "<br>";
}
//Almacenar imagen TERMINA ------------------------------- IMAGEN --------------------------------------


//Almacenar ARCHIVO TXT INICIA   ------------------------------- TXT --------------------------------------

$ar = fopen("archivotxt/".$nombre.".txt","a") or die ("Error al crear");
$des = $_REQUEST['descripcion'];
fwrite($ar, $des);
echo "Se guardo el archivo";
echo "<br>";

//Almacenar ARCHIVO TXT TERMINA ------------------------------- TXT --------------------------------------


?>