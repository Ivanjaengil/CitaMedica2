<?php
include('config.php');
include('lib.php');

$fechahora = date(format: 'Y-m-d H:i:s');  

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($tituloPagina); ?></title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1><?php echo htmlspecialchars($tituloPagina); ?></h1>
    <form action="control.php" method="POST">
      <fieldset>
        <legend>Control de acceso (<?php  echo $fechahora?>)</legend>
        
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required> 

        <label for="clave">Contraseña:</label>
        <input type="password" name="clave" id="clave" required>
 
        
        <input type="submit" name="benvio" id="benvio" value="Identificarse">
      </fieldset>
    </form>
  </body>
</html>
