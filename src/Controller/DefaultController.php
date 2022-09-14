<?php
// src/Controller/UserController.php
namespace App\Controller;


use App\Entity\Game;
use App\Repository\GameRepository;
use Doctrine\Persistence\Event\ManagerEventArgs;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use function Monolog\getName;

class DefaultController extends AbstractController
{
    public function defaultPage(): Response
    {
    return $this->render('table.html.twig', [
        "hello" => "Закинь ссылку",
        "link" => "Напиши название"
    ]);
    }

    public function gameAdd(ManagerRegistry $doctrine, Request $request): Response
    {
        try
        {
            $entityManager = $doctrine->getManager();
            $body = $request->query->get("urlSteam");
            $name = $request->query->get("name");
            // $body = $request->getContent();
            /** @var GameRepository $how */
            $how = $entityManager->getRepository(Game::class);
            $game = $how->findOneBy(["urlSteam"=>$body]);
//            $game = $how->findOneBy(["name"=>$name]);

            if ($game == null && $body != null && $name != null){
                $game = new Game();
                $game->setUrlSteam($body);
                $game->setName($name);
                $game->setNotes("");
                $game->setChecked("");
                $entityManager->persist($game);
                $entityManager->flush();
        }
            $entityManager->getRepository(Game::class);

            $how->findAll();
            $games=$how->findAll();
            $string ="<table border='1'>";
            foreach ($games as $game) {
                    $game->getName();
                    $game->getNotes();
                    $game->getUrlSteam();
                    $string .= "<br>"
                        ."<tr><td>".$game->getName()."</td>"
                        ."<td>"."<a href=\"".$game->getUrlSteam()."\">ссылка</a>\n".$game->getUrlSteam()."</td>"
                        ."\n"."<td>".$game->getNotes()
                        ."</td></tr>\n";
            }
            $string.="</table>";
        }
        catch (\Throwable $e)
        {
            return new Response($e->getMessage());
//            file_put_contents('c:/log.log', print_r($e->getMessage(), true), FILE_APPEND);
        }

        return new Response("Игра добавлена"."<br>".$body.$string);


    }
}

