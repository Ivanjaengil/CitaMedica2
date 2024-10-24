<?php
session_start();

if (isset($controla)) {
    if($controla){
        if (empty($_SESSION['idusuario'])) {
            header('Location: index.php');
            exit;
        }
    }
}

function conectarse($servidor, $usuarioservidor, $claveservidor, $opcionesPDO) {
    try {
        $conectado = new PDO($servidor, $usuarioservidor, $claveservidor, $opcionesPDO);
    } catch (PDOException $e) {
        echo "Error al conectar con la base de datos: " . $e->getMessage();  
        exit;
    }
    return $conectado;
}


function rastrea($conexion) {
    if (isset($_SESSION['idusuario'])) {
        $idusuario = $_SESSION['idusuario'];
        $nombrepagina = basename($_SERVER['REQUEST_URI']);
 
        $fechahora = date(format: 'Y-m-d H:i:s');  
 
        $sql = "INSERT INTO rastreo (idusuario, nombrepagina, fechahora) VALUES (:idusuario, :nombrepagina, :fechahora)";
       
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':idusuario', $idusuario, PDO::PARAM_INT);
        $stmt->bindParam(':nombrepagina', $nombrepagina, PDO::PARAM_STR);
        $stmt->bindParam(':fechahora', $fechahora, PDO::PARAM_STR);
        $stmt->execute();
    }
}

$tituloPagina = '';
$c_header = '';
$c_principal = '';
$c_aside = '';
