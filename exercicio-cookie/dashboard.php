<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style/styles.css">
</head>
<body>
    <div class="auth-container">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
        <p>Você está autenticado no sistema.</p>
        <a href="logout.php" class="auth-btn">Sair</a>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>