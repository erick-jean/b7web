<?php
    require 'functions/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Explorando Variáveis com PHP</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Ficha cadastral</h1>
            <p>Nome: <strong><?= $pessoa['nome']; // Saída: Nome da pessoa ?></strong></p>
            <p>Idade <strong><?= $pessoa['idade']; //Saída: Idade da pessoa ?></strong></p>
            <p>Sexo <strong><?= $pessoa['sexo']; //Sáida: Sexo da pessoa ?></strong></p>
            <p>Salário Mensal: <strong><?= conversaoMoeda($pessoa['salarioMensal']); ?></strong></p>
            <p>Salário anual: <strong><?= conversaoMoeda($salarioAnual); ?></strong></p>            
            <p>Status de Emprego: <strong><?= situacaoEmprego($pessoa['statusEmprego']); ?></strong></p>
            <p>Anos para aposentadoria: <strong> <?= $faltaParaAposentar; ?></strong></p>            
            <p>Habilidades: <strong><?php echo \implode(', ' , $pessoa['habilidades']); ?></strong></p>
        </div>
    </div>
</body>
</html>