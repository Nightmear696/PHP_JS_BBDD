<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "Ese correo ya está registrado.";
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO usuarios (email, password) VALUES (?, ?)");
    $stmt->execute([$email, $password]);
    header("Location: login.php");
}
?>

<form method="POST">
    Email: <input type="email" name="email" required>
    Contraseña: <input type="password" name="password" required>
    <button type="submit">Registrarse</button>
</form>
