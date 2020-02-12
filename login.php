<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>login</title>    
    <meta charset="UTF-8">
    <meta name="title" content="consulta">
    <meta name="description" content="login">    
    <link rel="stylesheet" type="text/css" href="estiloLogin.css">  
  </head>  
  <body>
    <div id="frm">
        <form action="consultaLogin.php" method = "post">
            <p>
                <label> Correo: </label>
                <input type="text" id= "email" name= "email" >
            </p>
            <p>
                <label>Teléfono: </label>
                <input type="text" id= "telefono" name= "telefono">
            </p>
            <p>
                <input type="submit" id= "btn" value= "login">
            </p>
        
        </form>
    </div>    

  </body>  
</html>