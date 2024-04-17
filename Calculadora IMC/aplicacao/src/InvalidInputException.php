<?php
    class InvalidInputException extends Exception
    {
        public function __construct(string $message)
        {
            parent::__construct($message);
        }
    }
    public function invalidinput (){
        $peso = $usuario->getPeso(),
        $altura = $usuario->getAltura(),
        $sexo = $usuario->getSexo()->value,
            if ($peso <= 0) {
                throw new InvalidInputException('Peso deve ser um valor positivo.');
            }
    
            if ($altura <= 0) {
                throw new InvalidInputException('Altura deve ser um valor positivo.');
            }
    
            if (!in_array($sexo->value, SexoEnum::getValues())) {
                throw new InvalidInputException('Sexo inválido.');
            }
        }   
