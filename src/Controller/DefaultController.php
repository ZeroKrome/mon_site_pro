<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    // de base c'est symfony qui s'occupe du routage. Ici, on est en traind e dire de laisser React gérer le routage à l'exception des routes admin, api et
    #[Route('/{reactRouting}', name: 'app_home',  requirements: ['reactRouting' => "^(?!api|admin|connexion|deconnexion).+"], defaults: ['reactRouting' => null])]
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }
}
