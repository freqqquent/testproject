<?php


namespace App\Entity;

use App\Repository\GradeGameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GradeGameRepository::class)]
class GradeGame
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\ManyToOne(targetEntity:"Person")]
    #[ORM\JoinColumn(name:"person_id", referencedColumnName:"id")]
    private Person $person;
    #[ORM\ManyToOne(targetEntity:"Game")]
    #[ORM\JoinColumn(name:"game_id", referencedColumnName:"id")]
    private Game $game;
    #[ORM\Column(type: 'integer')]
    private int $grade;
}