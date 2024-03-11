<?php // src/Contoller/IndexController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('page/meeting/index.html.twig', [
            'controller_name' => 'MeetingController',
        ]);
    }

    #[Route('/forum', name: 'app_forum')]
    public function forum(): Response
    {
        return $this->render('meeting/index.html.twig', [
            'controller_name' => 'MeetingController',
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('meeting/index.html.twig', [
            'controller_name' => 'MeetingController',
        ]);
    }
}
