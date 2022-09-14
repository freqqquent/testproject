<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Entity\Game;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GamesController extends AbstractController
{
    /**
     * @param ManagerRegistry $doctrine
     * @param int $id
     * @return Response магический doctrine
     */
    public function gamePage(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        /** @var Game $game */
        $game = $entityManager->find(Game::class, $id);
        return new Response(
            '<html><body>Lucky number: ' . $game->name. '</body></html>'
        );
    }


}