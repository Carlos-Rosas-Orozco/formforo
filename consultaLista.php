<?php

function taller(){
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
    $sql = 'select count(taller) from asistencia where taller = "Las claves de la Nueva Escuela Mexicana"';
    $datos = mysqli_query($conn, $sql);
                
               
    return $datos;
                
}   

function taller2(){
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
    $sql = 'select count(taller) from asistencia where taller = "Más allá de las palabras: equidad e inclusión como práctica"';
    $datos = mysqli_query($conn, $sql);
                
               
    return $datos;
                
}   

function taller3(){
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
    $sql = 'select count(taller) from asistencia where taller = "Evaluación como proceso hacia la excelencia educativa"';
    $datos = mysqli_query($conn, $sql);
                
               
    return $datos;
                
}   

function taller4(){
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
    $sql = 'select count(taller) from asistencia where taller = "Educación Emocional"';
    $datos = mysqli_query($conn, $sql);
                
               
    return $datos;
                
}   

function taller5(){
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
    $sql = 'select count(taller) from asistencia where taller = "Tips para redactar tesis"';
    $datos = mysqli_query($conn, $sql);
                
               
    return $datos;
                
}   

function taller6(){
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
    $sql = 'select count(taller) from asistencia where taller = "Elaboración de estrategias para intervención educativa"';
    $datos = mysqli_query($conn, $sql);
                
               
    return $datos;
                
}   

function taller7(){
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
    $sql = 'select count(taller) from asistencia where taller = "Funcionamiento cognitivo e implementación de estrategias de enseñanza aprendizaje"';
    $datos = mysqli_query($conn, $sql);
                
               
    return $datos;
                
}   

function taller8(){
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
    $sql = 'select count(taller) from asistencia where taller = "La creatividad, un espacio innovador para el aprendizaje"';
    $datos = mysqli_query($conn, $sql);
                
               
    return $datos;
                
}   

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