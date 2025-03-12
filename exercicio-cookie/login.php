<?php
session_start();
$mensagem = $_SESSION['mensagem'] ?? null; // Exibe mensagem da sessão
unset($_SESSION['mensagem']); // Limpa a mensagem após exibir


if (isset($_SESSION['usuario'])) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/styles.css">
    <title>Login de sistema</title>
</head>

<body>
    <div class="container">
        <div class="form">
            <h2>Faça seu login<span>.</span></h2>
            <form action="auth.php" method="post">
                <input type="text" placeholder="Usuário" name="login" id="login" value="<?= $login ?? '' ?>">
                <input type="password" placeholder="Senha" name="password" id="password" value="<?= $password ?? '' ?>">
                <?php if (!empty($mensagem)): ?>
                    <p class="mensagem"><?= $mensagem; ?></p>
                <?php endif; ?>
                <div class="theme-toggle">
                    <span>🌙</span>
                    <label class="switch">
                        <input type="checkbox" id="theme-switch">
                        <span class="slider"></span>
                    </label>
                    <span>☀️</span>
                </div>
                <a href="#" class="forgot-password">Esqueci minha senha</a>
                <button>Entrar</button>
                <a href="#" class="create-account">Ainda não tenho uma conta</a>
            </form>
        </div>
        <div class="image-container"></div>
    </div>
</body>

<script src="assets/js/script.js"></script>

</html>