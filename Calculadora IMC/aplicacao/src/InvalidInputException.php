<?php
    class InvalidInputException extends Exception
    {
        public function __construct(string $message)
        {
            parent::__construct($message);
        }
    }
    
     {
            if ($peso <= 0) {
                throw new InvalidInputException('Peso deve ser um valor positivo.');
            }
    
            if ($altura <= 0) {
                throw new InvalidInputException('Altura deve ser um valor positivo.');
            }
    
            if (!in_array($sexo->value, SexoEnum::getValues())) {
                throw new InvalidInputException('Sexo inválido.');
            }
    
            if ($dataNascimento > new DateTimeImmutable()) {
                throw new InvalidInputException('Data de nascimento inválida.');
            }
        }
    }
