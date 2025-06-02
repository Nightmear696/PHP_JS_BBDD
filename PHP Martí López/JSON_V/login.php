<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $users = file_exists('users.json') ? json_decode(file_get_contents('users.json'), true) : [];

    foreach ($users as $user) {
        if ($user['email'] == $email && $user['password'] == $password) {
            $_SESSION['user'] = $email;
            header("Location: dashboard.php");
            exit;
        }
    }
    echo "Email o contraseña incorrectos.";
}
?>

<form method="POST">
    Email: <input type="email" name="email" required>
    Contraseña: <input type="password" name="password" required>
    <button type="submit">Iniciar sesión</button>
</form>
