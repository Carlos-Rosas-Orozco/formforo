<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
$servername = "localhost";
//$username = "upncolim_asisten";
//$password = "l1nkacces0";
$database = "formforo";
$username = "root";
$password = "";
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
$numeroPalbaras = str_word_count($_POST['descripcion']);
echo "<style> h2 { color: #FF0000; } </style>";
echo "<style> h3 { color: #137108; } </style>";

$bandera = 1; /* Esta bandera ayuda a realizar el insert en mysql despues de hacer todas las validaciones en los archivos, para que se cumpla 
la condicion "bandera" tiene que ser igual a 3 */

$bandera_archivos = 1; /* Esta bandera ayuda a guardar los archivos (word, imagen, txt) en las carpetas correspondientes despues de hacer todas 
las validaciones, para que se cumpla la condicion "bandera" tiene que ser igual a 3 */

$bandera_tamaño = 0;

//Almacenar Documento de Word INICIA ------------------------------- WORD ---------------------------------

$nombrefinal = $destino.basename($_FILES["documento"]["name"]);
$upload = $destino . $nombrefinal;
$faltante = "documentos/";
$archivo = $_FILES["documento"]["tmp_name"];
$mTipo = mime_content_type($archivo);
$size = filesize($archivo);

if (($mTipo == "application/msword") or ($mTipo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")){
      if($size < 1000000){ //Modificar el tamaño del archivo en Bytes 
            
            
            //echo "Archivo correcto ";
            echo "<br>";
            
      }
      else{
            $bandera_tamaño = 1;
            echo "<br>";
            echo "<center><H2>¡El tamaño del archivo excede los 1000000 Bytes, favor de reducir el tamaño. !</H2></center> ";
            echo "<br>"; 
            
      }
}
else{
      echo "<center><H1>¡Recuerda que tienes hasta el dia 29 de febrero para enviar tu ponencia en extenso en formato Word!</H1></center> ";
      echo "<br>";
      echo "<center><H1>¡Enviar al correo inscripcionesalforo@upncolima.org.mx !</H1></center> ";
      echo "<center><H1>¡Para cualquier aclaración no dude en llamar al teléfono 3125931731!</H1></center> ";
}




//Almacenar Documento de Word TERMINA ------------------------------- WORD --------------------------------


//Almacenar imagen INICIA ------------------------------- IMAGEN ------------------------------------------

$nombrefinal_imagen = $destinoImagen.basename($_FILES["imagen"]["name"]);
$upload_imagen = $destinoImagen . $nombrefinal_imagen;
$faltante_imagen = "imagen/";
$archivo_imagen = $_FILES["imagen"]["tmp_name"];
$mTipo_imagen = mime_content_type($archivo_imagen);
$size_imagen = filesize($archivo_imagen); 

if (($mTipo_imagen == "image/jpeg") or ($mTipo_imagen == "application/pdf") or ($mTipo_imagen == "image/png")){
      if($size_imagen < 5000000){ //Modificar el tamaño de la imagen en Bytes
            
            $bandera_archivos += 1; //segunda bandera para almacenar archivos en carpeta = 3
            //echo "Archivo correcto";
            echo "<br>";
            $bandera += 1; //segunda suma bandera = 3
      }
      else{
            echo "<center><H2>¡El tamaño de la imagen excede los 5000000 Bytes, favor de reducir el tamaño o cambiar el formato por pdf, png o jpg.!</H2></center> ";
            echo "<br>";  
      }      
}
else{
      echo "<center><H2>¡Solo se admiten imagenes en formato pdf, png o jpg !</H2></center> ";
      echo "<br>";
}
//Almacenar imagen TERMINA ------------------------------- IMAGEN -----------------------------------------


//Almacenar ARCHIVO TXT INICIA   ------------------------------- TXT --------------------------------------

if($numeroPalbaras <= 300){ //Modificar el número de palabras 
     
      $bandera_archivos += 1; //tercera bandera para almacenar archivos en carpeta = 4
      $bandera += 1; //tercera suma bandera = 4

}
else{
      echo "<center><H2>¡El numero de palabras tiene que ser un maximo de 300 !</H2></center> ";
      echo "<br>";
      echo "<center><H2>¡Su resumen cuenta con ". $numeroPalbaras . " palabras  !</H2></center> ";
      echo "<br>";
}
                                     

//Almacenar ARCHIVO TXT TERMINA ------------------------------- TXT ---------------------------------------

//Almacenar ARCHIVOS EN CARPETAS INICIA ------------------------------- CARPETAS --------------------------

if($bandera_archivos == 3){

      move_uploaded_file($archivo,$destino);
      move_uploaded_file($archivo_imagen,$destinoImagen);
      $ar = fopen("archivotxt/".$nombre.".txt","a") or die ("Error al crear");
      $des = $_REQUEST['descripcion'];
      fwrite($ar, $des);
      //echo "Se guardo el archivo";
      echo "<br>";
      
}
else {
     // echo "Error al guardar ";
      echo "<br>";
}

//Almacenar ARCHIVOS EN CARPETAS CIERRA ------------------------------- CARPETAS --------------------------

//Insert en mysql si se cumplen todas las condiciones---------------------INSERT---------------------------

if($bandera == 3 ){


$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Asistencia (fecha,hora,nombre,perfil,institucion,ciudad,telefono,email,taller,destino,destino_imagen,destino_txt) VALUES ('$fecha','$hora','$nombre','$perfil','$institucion','$ciudad','$telefono','$email','$taller', '$destino', '$destinoImagen','$destinotxt')";

if (mysqli_query($conn, $sql)) {
      echo "<center><H3>¡Datos Guardados Correctamente!</H3></center>";
      
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

}
else{
      echo "<center><H2>¡Error al guardar revisar la informacion correctamente!</H2></center>";
      echo "<center><H2>¡Regresa al registro!</H2></center>";
}



?>