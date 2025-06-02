<?php
$dsn = "mysql:host=localhost;dbname=zoologico;charset=utf8mb4";
$usuario = "root"; // o tu usuario
$contraseña = ""; // pon la contraseña de tu MySQL si tienes

try {
    $pdo = new PDO($dsn, $usuario, $contraseña);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
