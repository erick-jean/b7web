<?php

require ('functions.php');

$erro = null;
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $texto = $_POST['texto'];

    //A função htmlspecialchars($texto); no PHP é usada para 
    //converter caracteres especiais em entidades HTML, evitando 
    //possíveis vulnerabilidades de Cross-Site Scripting (XSS).
    $texto = htmlspecialchars($texto);
    
    //Romove espaços antes e depois da palavra
    $texto = trim($texto);

    //
    //$texto = filter_var($texto, FILTER_SANITIZE_EMAIL);
    if(filter_var($texto, FILTER_VALIDATE_EMAIL) == false) {
        $erro = "Texto deve ser um email";
    }elseif(empty($texto)){
        $erro = "O campo texto é obrigatório.";
    } elseif (strlen($texto) < 5) {
        $erro = 'Texto deve conter no minimo 5 caracteres';
    } elseif (strlen($texto) > 10 ) {
        $erro = 'texto deve conter no maximo 10 caracteres';
    } else {
        $sucesso = 'Texto validado com sucesso.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>

<body>
    <form method="POST">
        <h1>Insira um texto</h1>
        <?php if (validar($erro)) : ?>
            <p style="color:red">
               <?= $erro; ?>
            </p>
        <?php endif; ?>
        <?php if (validar($sucesso)) : ?>
            <p style="color:green">
            <?= $sucesso; ?>
            </p>
        <?php endif; ?>
        <label for="">campo de texto</label>
        <input type="text" name="texto" id="campo_texto">
        <button type="submit">Enviar</button>
    </form>
</body>

</html>