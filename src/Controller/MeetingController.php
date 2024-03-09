<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/meeting', name: 'app_meeting')]
class MeetingController extends AbstractController
{
    #[Route('/', name: 'app_meeting_index')]
    public function index(): Response
    {
        return $this->render('meeting/index.html.twig', [
            'controller_name' => 'MeetingController',
        ]);
    }

    #[Route('/{slug}', name: 'app_meeting_single')]
    public function meetingSingle(): Response
    {
        return $this->render('meeting/index.html.twig', [
            'controller_name' => 'MeetingController',
        ]);
    }
}
