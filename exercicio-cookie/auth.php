<?php
session_start(); // Inicia a sessão para armazenar informações do usuário

// Array contendo os usuários cadastrados no sistema com login e senha
$usuarios = [
    [
        'login' => 'admin',
        'senha' => '123456'
    ],
    [
        'login' => 'usuario1',
        'senha' => 'senha123'
    ],
    [
        'login' => 'cliente',
        'senha' => 'minhasenha'
    ],
    [
        'login' => 'dev',
        'senha' => 'php2024'
    ]
];

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Se algum dos campos estiver vazio, define uma mensagem de erro e redireciona de volta ao login
    if (empty($_POST['login']) || empty($_POST['password'])) {
        $_SESSION['mensagem'] = "Preencha todos os campos."; // Armazena a mensagem na sessão
        header("Location: index.php"); // Redireciona para a página de login
        exit;
    }

    // Obtém os valores do formulário e aplica `htmlspecialchars` para evitar ataques XSS
    $usuarioDigitado = htmlspecialchars($_POST['login']);
    $senhaDigitada = htmlspecialchars($_POST['password']);

    $autenticado = false; // Variável de controle para verificar se o usuário foi autenticado

    // Percorre o array de usuários cadastrados para verificar se o login e a senha são válidos
    foreach ($usuarios as $usuario) {
        if ($usuarioDigitado === $usuario['login'] && $senhaDigitada === $usuario['senha']) {
            $autenticado = true; // Define como verdadeiro se encontrar um usuário correspondente
            $_SESSION['usuario'] = $usuarioDigitado; // Armazena o usuário na sessão
            header("Location: dashboard.php"); // Redireciona para a área restrita
            if (isset($_POST['remember'])) {
                // Se a opção "Lembrar de mim" estiver marcada, define um cookie com o login por 30 dias
                setcookie('login', $usuarioDigitado, time() + 3600 * 24 * 30, '/');
            }
            exit;
        }
    }

    // Se nenhum usuário foi autenticado, define a mensagem de erro e redireciona para o login
    $_SESSION['mensagem'] = "Usuário e/ou senha incorretos.";
    header("Location: login.php");
    exit;
}
?>
