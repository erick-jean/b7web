<?php
// Inicia a sessão para armazenar dados do usuário durante a navegação
session_start(); 

// Definição de credenciais de login (essas credenciais devem ser armazenadas de forma segura, preferencialmente em um banco de dados)
$usuarioCorreto = 'admin';
$senhaCorreta = '123456';

// Verifica se a requisição foi feita via método POST (o que significa que o formulário foi enviado)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Verifica se os campos de login e senha foram preenchidos
    if (empty($_POST['login']) || empty($_POST['password'])) {
        // Armazena uma mensagem de erro na sessão para exibição na página de login
        $_SESSION['mensagem'] = "Preencha todos os campos.";
        
        // Redireciona o usuário de volta para a página de login
        header("Location: index.php");
        exit; // Encerra a execução do script para evitar que mais código seja processado
    }

    // Obtém os valores do formulário e aplica `htmlspecialchars()` para evitar ataques XSS
    $usuario = htmlspecialchars($_POST['login']);
    $senha = htmlspecialchars($_POST['password']);

    // Verifica se o usuário e a senha inseridos correspondem às credenciais corretas
    if ($usuario === $usuarioCorreto && $senha === $senhaCorreta) {
        // Armazena o nome do usuário na sessão para permitir acesso à área restrita
        $_SESSION['usuario'] = $usuario;
        
        // Redireciona o usuário para a página restrita (dashboard)
        header("Location: dashboard.php");
        exit; // Encerra a execução do script
    } else {
        // Se as credenciais estiverem erradas, armazena uma mensagem de erro na sessão
        $_SESSION['mensagem'] = "Usuário e/ou senha incorretos.";
        
        // Redireciona o usuário de volta para a página de login
        header("Location: index.php");
        
    }
}
?>
