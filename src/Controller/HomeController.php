<?php

namespace App\Controller;

use App\Entity\MatchMaker;
use App\Entity\Player;
use App\Repository\PlayerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function index(PlayerRepository $playerRepository): Response
    {

        $playerA = new Player();
        $playerA->setUsername('Greg');

        $playerB = new Player();
        $playerB->setUsername('Bob');

        $match = new MatchMaker($playerA, $playerB);
        $match-> setStatus(MatchMaker::STATUS_PLAYING);

        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'playerArray' => $playerRepository->fetchBestPlayers()

        ]);
    }

    /**
     * @Route("/name/{name}", name="displayName")
     */

    public function displayname(Request $request): Response

    {

        dump($name = $request->get('name'));

        return new Response($name);

    }

}
