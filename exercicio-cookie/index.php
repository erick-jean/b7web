<?php
session_start();

// Se o usuário já estiver logado, redireciona para o dashboard
if (isset($_SESSION['usuario'])) {
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}
?>
