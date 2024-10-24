<?php
$controla = true;

include('config.php');
include('lib.php');
$tituloPagina = 'Cita para '.$_GET['especialista'].' ('.$_GET['especialidad'].')';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
  $conexion = conectarse($servidor, $usuarioservidor, $claveservidor, $opcionesPDO);

  rastrea($conexion); 
  $sql = "INSERT INTO citas (idespecialista, idusuario, fechacita, horacita, descripcion) VALUES (:idespecialista, :idusuario, :fechacita, :horacita, :descripcion)";
  $stmt = $conexion->prepare($sql);
 
  $idespecialista = $_POST['idespecialista'];
  $fechacita = $_POST['fechacita'];
  $horacita = $_POST['horacita'];
  $descripcion = $_POST['descripcion'];
 
  $stmt->bindParam(':idespecialista', $idespecialista, PDO::PARAM_INT);
  $stmt->bindParam(':idusuario', $_SESSION['idusuario'], PDO::PARAM_INT);
  $stmt->bindParam(':fechacita', $fechacita, PDO::PARAM_STR);
  $stmt->bindParam(':horacita', $horacita, PDO::PARAM_STR);
  $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
 
  $stmt->execute();
 
  header('Location: portada.php');
  exit;
}


?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo htmlspecialchars($tituloPagina) ?></title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <header>
      <?php include('header.php'); ?>
    </header>
    <main>
      <section>
        <form name="formucita" id="formucita" action="cita.php?especialista=<?=$_GET['especialista']?>&especialidad=<?=$_GET['especialidad']?>" method="POST">
          <input type="hidden" name="idespecialista" id="idespecialista" value="<?=$_REQUEST['idespecialista']?>">
           <label for="fechacita">Fecha:</label>
           <input type="date" name="fechacita" id="fechacita" required>
           <label for="horacita">Hora:</label>
           <input type="time" name="horacita" id="horacita" required>
           <label for="descripcion">Descripcion:</label>
           <input type="text" name="descripcion" id="descripcion" required>
           <input type="submit" value="Registrar cita">

        </form>   
      </section>
    </main>
    <footer>
      <?php include('footer.php');?>
    </footer>
  </body>
</html>
