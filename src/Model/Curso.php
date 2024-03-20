<?php

namespace Alura\Solid\Model;

use Alura\Solid\Service\Pontuavel;

class Curso implements Pontuavel
{
    private $nome;
    private $videos;
    private $feedbacks;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
        $this->videos = [];
        $this->feedbacks = [];
    }

    public function receberFeedback(Feedback $feedbacks): void
    {
        $this->feedbacks[] = $feedbacks;
    }

    public function adicionarVideo(Video $video)
    {
        if ($video->minutosDeDuracao() < 3) {
            throw new \DomainException('Video muito curto');
        }

        $this->videos[] = $video;
    }

    /** @return Video[] */
    public function recuperarVideos(): array
    {
        return $this->videos;
    }

    public function pontuacao(): int
    {
        return 100;
    }

    public function assistir(): void
    {
        foreach ($this->recuperarVideos() as $video) {
            $video->assistir();
        }
    }
}
