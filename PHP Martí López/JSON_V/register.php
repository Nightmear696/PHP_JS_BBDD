<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $users = file_exists('users.json') ? json_decode(file_get_contents('users.json'), true) : [];

    foreach ($users as $user) {
        if ($user['email'] == $email) {
            echo "Este correo ya está registrado.";
            exit;
        }
    }

    $users[] = ['email' => $email, 'password' => $password];
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
    header("Location: login.php");
}
?>

<form method="POST">
    Email: <input type="email" name="email" required>
    Contraseña: <input type="password" name="password" required>
    <button type="submit">Registrarse</button>
</form>
