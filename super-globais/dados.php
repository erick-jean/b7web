<?php

function verificarUsuarioSenha($usuario, $senha) {
    $usuarioCorreto = 'admin';
    $senhaCorreta = '123456';

    if ($usuario === $usuarioCorreto && $senha === $senhaCorreta) {
        return "Usuário e senha corretos";
    } else {
        return "Usuário e/ou senha incorretos";
    }
}

    if(!empty($_POST['login']) && !empty($_POST['password'])) {
        $usuario = htmlspecialchars($_POST['login']);
        $senha = htmlspecialchars($_POST['password']);

        echo verificarUsuarioSenha($usuario, $senha);
    } else {
        echo "Preencha todos os campos";
    }