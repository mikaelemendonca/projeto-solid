<?php

namespace Alura\Solid\Service;

class CalculadorPontuacao
{
    public function recuperarPontuacao(Pontuavel $conteudo)
    {
        return $conteudo->pontuacao();
    }
}
