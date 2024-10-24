<?php
$controla = true;
include('config.php');
include('lib.php');
$tituloPagina = 'Selección de especialidad';

$conexion = conectarse($servidor, $usuarioservidor, $claveservidor, $opcionesPDO);

rastrea($conexion); 


$sql = "SELECT especialidades.especialidad, usuarios_especialidades.idespecialidad FROM especialidades INNER JOIN usuarios_especialidades ON especialidades.idespecialidad = usuarios_especialidades.idespecialidad WHERE usuarios_especialidades.idusuario = :idusuario;";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':idusuario',$_SESSION['idusuario'],PDO::PARAM_INT);
$stmt->execute();

$c = 0;
while($reg = $stmt->fetch()){
  $c++;
  $c_principal.='<div class="filadato">';
   $c_principal.='<div class="cajadato0">'.$c.'</div>';
   $c_principal.='<div class="cajadato1">'.$reg['especialidad'].'</div>';
   $c_principal.='<div class="cajadato2"><a href="especialista.php?idespecialidad='.$reg['idespecialidad'].'&especialidad='.$reg['especialidad'].'">Solicitar</a></div>';
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
