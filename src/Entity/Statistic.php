<?php

namespace App\Entity;

use App\Repository\StatisticRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatisticRepository::class)]
class Statistic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $row_number_count;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRowNumberCount(): string
    {
        return $this->row_number_count;
    }

    public function setRowNumberCount(string $row_number_count): self
    {
        $this->row_number_count = $row_number_count;

        return $this;
    }
}
