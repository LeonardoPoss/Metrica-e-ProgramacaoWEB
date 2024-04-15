<?php

require_once __DIR__ . '/src/Usuario.php';
require_once __DIR__ . '/src/CalculadoraImc.php';
require_once __DIR__ . '/src/SexoEnum.php';
require_once __DIR__ . '/src/ClassificacaoImcEnum.php';
require_once __DIR__ . '/src/InvalidInputException.php';

try{
    $usuario = new Usuario( nome: $_POST['nome'], 
                            peso: $_POST['peso'], 
                            altura: $_POST['altura'],
                            sexo:SexoEnum::from($_POST['sexo']),
                            dataNascimento: new DateTimeImmutable($_POST['data_nascimento']));
}catch (InvalidInputException $e) {
    echo 'Erro: ' . $e->getMessage();
    exit;
}

$calculadora = new CalculadoraImc($usuario);
$idade = $usuario->getIdadeAtual();
$sexo = $usuario->getSexo()->value;
($idade<=19) ? $resultado = ClassificacaoImcEnum::classifica_adolescente($calculadora->calcular(), $sexo, $idade) :
$resultado = ClassificacaoImcEnum::classifica_adulto($calculadora->calcular());

// 1) ler o template de resposta
$template = file_get_contents(__DIR__ . '/src/templates/resultado.html');

// 2) trocar cada valor estatico pelo valor do script
$template = str_replace(
    [
        '{{USUARIO}}',
        '{{PESO}}',
        '{{ALTURA}}',
        '{{IDADE}}',
        '{{SEXO}}',
        '{{ICM}}',
        '{{CLASSIFICACAO}}'
    ],
    [
        $usuario->getNome(),
        $usuario->getPeso(),
        $usuario->getAltura(),
        $usuario->getIdadeAtual(),
        $usuario->getSexo()->value,
        $calculadora->calcular(),
        $resultado
    ],
    $template);


echo $template;
