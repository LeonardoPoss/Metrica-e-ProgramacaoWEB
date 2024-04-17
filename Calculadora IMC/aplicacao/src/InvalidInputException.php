<?php
class InvalidInputException extends Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}

function invalidinput($usuario)
{
    $peso = $usuario->getPeso();
    $altura = $usuario->getAltura();

    if ($peso <= 0) {
        return 'Peso deve ser um valor positivo.';
    }

    if ($altura <= 0) {
        return 'Altura deve ser um valor positivo.';
    }

    // Se nenhum problema for encontrado, retorna null ou false
    return null; // ou return false;
}

