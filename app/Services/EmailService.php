<?php
namespace App\Services;

class EmailService
{
    private $de;
    private $para;
    private $assunto;
    private $conteudo;

    public function __construct(
        string $de = 'contatos@site.com.br',
        string $para = '',
        string $assunto = '',
        string $conteudo = ''
    )
    {
        $this->de = $de;
        $this->para = $para;
        $this->assunto = $assunto;
        $this->conteudo = $conteudo;
    }

    public function dispararEmail()
    {
        return '--------- Email Enviado ----------';
    }
}
