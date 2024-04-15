<?php

class RNexception extends Exception
{
    public function __construct(string $message, int $codeError)
    {
        parent::__construct($message, $codeError);
        $this->gerarLog();
    }

    private function gerarLog() 
    {
        $str =  'Message: ' . $this->getMessage();
        $str .= PHP_EOL . 'File: ' . $this->getFile();
        $str .= PHP_EOL . 'Line:' . $this->getLine();
        $str .= PHP_EOL . 'ErrorCode: ' . $this->getCode();
        $str .= PHP_EOL . 'Stack Strace: ' . $this->getTraceAsString();

        file_put_contents(__DIR__ . '../logs_de_erro/log_error.txt', 
        $str . PHP_EOL, FILE_APPEND);
    }
}
