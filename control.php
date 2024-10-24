<?php
$controla = false;
include('config.php');
include('lib.php');

$loginCorrecto = false;
if(!empty($_POST['usuario']) && !empty($_POST['clave'])){
    $conexion = conectarse($servidor, $usuarioservidor, $claveservidor, $opcionesPDO);

    rastrea($conexion); 
    
    $sql = "SELECT usuario, idusuario, clave FROM usuarios WHERE usuario = :usuario";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':usuario',$_POST['usuario'],PDO::PARAM_STR);
    $stmt->execute();

    if($reg = $stmt->fetch()){
        if(password_verify($_POST['clave'],$reg['clave'])){
            $_SESSION['idusuario'] = $reg['idusuario'];
            $_SESSION['usuario'] = $reg['usuario'];

            $fechahora = date(format: 'Y-m-d H:i:s');  
 
            $sql= "INSERT INTO registros (fechahoraentrada, usuario_id) VALUES (:fechahoraentrada, :usuario_id)";
            $stmt2 = $conexion->prepare($sql); 
            $stmt2->bindParam(':fechahoraentrada', $fechahora, PDO::PARAM_STR);
            $stmt2->bindParam(':usuario_id', $_SESSION['idusuario'], PDO::PARAM_INT);
            $stmt2->execute();
 

            header('Location: portada.php');
            exit;
        }
    }

}


if(!$loginCorrecto){
    header('Location: ./');
}

