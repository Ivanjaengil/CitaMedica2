<?php
$controla = true;
include('config.php');
include('lib.php');

$tituloPagina = 'Selección de especialista en '.$_GET['especialidad'];



$conexion = conectarse($servidor, $usuarioservidor, $claveservidor, $opcionesPDO);

rastrea($conexion); 
 

$sql = "SELECT idespecialista, nombre, apellido1, apellido2 FROM especialistas WHERE idespecialidad= :idespecialidad";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':idespecialidad',$_GET['idespecialidad'],PDO::PARAM_INT);
$stmt->execute();

$c = 0;
while($reg = $stmt->fetch()){
  $c++;
  $especialista = $reg['nombre']." ".$reg['apellido1']." ".$reg['apellido2'];

  $c_principal.='<div class="filadato">';
   $c_principal.='<div class="cajadato0">'.$c.'</div>';
   $c_principal.='<div class="cajadato1">'.$especialista.'</div>';
   $c_principal.='<div class="cajadato2"><a href="cita.php?idespecialista='.$reg['idespecialista'].'&especialidad='.$_GET['especialidad'].'&especialista='.$especialista.'">Solicitar</a></div>';
  $c_principal.='</div>';
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
        <?php echo $c_principal ?>
      </section>
    </main>
    <footer>
      <?php include('footer.php');?>
    </footer>
  </body>
</html>
