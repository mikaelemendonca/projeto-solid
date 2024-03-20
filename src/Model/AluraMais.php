<?php

namespace Alura\Solid\Model;

use Alura\Solid\Service\Pontuavel;

class AluraMais extends Video implements Pontuavel
{
    private $categoria;

    public function __construct(string $nome, string $categoria)
    {
        parent::__construct($nome);
        $this->categoria = $categoria;
    }

    public function recuperarUrl(): string
    {
        return str_replace(' ', '-', strtolower($this->categoria));
    }

    public function pontuacao(): int
    {
        return $this->minutosDeDuracao() * 2;
    }
}
