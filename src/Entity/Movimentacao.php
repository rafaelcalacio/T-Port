<?php

namespace App\Entity;

use App\Repository\MovimentacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovimentacaoRepository::class)]
class Movimentacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 18)]
    private $tipo;

    #[ORM\Column(type: 'datetime')]
    private $inicio;

    #[ORM\Column(type: 'datetime')]
    private $fim;

    #[ORM\ManyToOne(targetEntity: Conteiner::class)]
    private $conteiner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getInicio(): ?\DateTimeInterface
    {
        return $this->inicio;
    }

    public function setInicio(\DateTimeInterface $inicio): self
    {
        $this->inicio = $inicio;

        return $this;
    }

    public function getFim(): ?\DateTimeInterface
    {
        return $this->fim;
    }

    public function setFim(\DateTimeInterface $fim): self
    {
        $this->fim = $fim;

        return $this;
    }

    public function getConteiner(): ?Conteiner
    {
        return $this->conteiner;
    }

    public function setConteiner(?Conteiner $conteiner): self
    {
        $this->conteiner = $conteiner;

        return $this;
    }
}
