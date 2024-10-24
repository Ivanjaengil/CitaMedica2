<?php
$servidor = 'mysql:host=localhost;dbname=citamedica2;port=3306;charset=utf8';
$usuarioservidor = 'citamedica2';
$claveservidor = 'patata#1P';
$opcionesPDO = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
