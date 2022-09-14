<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    public string $name;

    #[ORM\Column(type: 'string', length: 255)]
    private string $urlSteam;

    #[ORM\Column(type: 'string', length: 255)]
    private string $notes;

    #[ORM\Column(type: 'string', length: 255)]
    private string $checked;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrlSteam(): string
    {
        return $this->urlSteam;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function getChecked(): string
    {
        return $this->checked;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setUrlSteam(string $urlSteam): void
    {
        $this->urlSteam = $urlSteam;
    }

    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }

    public function setChecked(string $checked): void
    {
        $this->checked = $checked;
    }
}
