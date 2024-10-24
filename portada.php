<?php
$controla = true;

include('config.php');
include('lib.php');
$tituloPagina = 'Portada';

?>
<html>
  <head>
    <title><?php echo $tituloPagina?></title>
	  <link href="css/estilo.css" rel="stylesheet" type="text/css">
	  <script src="js/libreria.js" type="text/javascript"></script>
  </head>
  <body>
    <header>
      <?php include('header.php');?>
    </header>
    <main>
      <section>
      	<ul>
        <?php 
        	echo 	"<li><a href=\"pruebas.php\">Pruebas</a></li>"
        				."<li><a href=\"usuarios_alta.php\">Alta usuarios</a></li>"
        				."<li><a href=\"usuarios_listado.php\">Listado usuarios</a></li>"
        				."<li><a href=\"especialidad.php\">Pedir cita</a></li>"
        				."<li><a href=\"cita_listado.php\">Listado de citas</a></li>";
        ?>
        </ul>
      </section>
      <aside>
      <?php echo $c_aside ?>
      </aside>
    </main>
    <footer>
      <?php include('footer.php');?>
    </footer>
  </body>
</html>
