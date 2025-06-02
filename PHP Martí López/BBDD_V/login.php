<?php
session_start();
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['user'] = $email;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Email o contraseña incorrectos.";
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email" required>
    Contraseña: <input type="password" name="password" required>
    <button type="submit">Iniciar sesión</button>
</form>
