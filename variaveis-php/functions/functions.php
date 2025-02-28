<?php
$pessoa = [
    'nome' => 'Erick Prado',
    'idade' => 26,
    'sexo' => 'M',
    'salarioMensal' => 2210.30,
    'statusEmprego' => true,
    'habilidades' => ['PHP', 'JavaScript', 'HTML', 'CSS']
];

/**
 * Calcula o salário anual
 * Calculate the annual salary
 * @param float $salarioMensal Salário mensal do usuário / User's monthly salary
 * 
 * @return float Retorna o salário anual do usuário / Returns the user's annual salary
 */
function calculoSalarioAnual (float $salarioMensal) : float {
    $tercoDeFerias = $salarioMensal / 3;
    $salarioAnual = ($salarioMensal * 13) + $tercoDeFerias;
    return $salarioAnual;
}
$salarioAnual = calculoSalarioAnual($pessoa['salarioMensal']);




/**
 * Converte um valor float para o formato de moeda
 * Convert a float value to currency format
 * @param float $valor Valor a ser convertido / Value to be converted
 * 
 * @return string Retorna o valor no formato de moeda em real / Returns the value in currency format in real
 */
function conversaoMoeda (float $valor) : string {
    return 'R$ ' . \number_format($valor, 2, ',', '.');
}




/**
 * Calcula a quantidade de anos que faltam para aposentar
 * Calculate the number of years remaining until retirement
 * @param int $idade Idade do usuário / age user
 * @param string $sexo Sexo do usuário / user gender
 * 
 * @return int Retorna a quantidade de anos que faltam para aposentar / Returns the number of years remaining until retirement
 */
function anosParaAposentar (int $idade, string $sexo) : int {
    return $sexo == 'M' ? 65 - $idade : 60 - $idade;
}
$faltaParaAposentar = anosParaAposentar($pessoa['idade'], $pessoa['sexo']);




/**
 * Retorna a situação de emprego do usuário
 * Returns the user's employment status
 * @param bool $statusEmprego Status de emprego do usuário / User's employment status
 * 
 * @return string Retorna a situação de emprego do usuário / Returns the user's employment status
 */
function situacaoEmprego(bool $statusEmprego): string {
    return $statusEmprego ? 'Empregado' : 'Desempregado';
} 