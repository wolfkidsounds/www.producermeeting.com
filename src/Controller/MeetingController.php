<?php // src/Controller/MeetingController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MeetingController extends AbstractController
{
    #[Route('/meeting/{slug}', name: 'app_meeting_single')]
    public function meetingSingle(): Response
    {
        return $this->render('page/meeting/single.html.twig', [
            'controller_name' => 'MeetingController',
        ]);
    }
}
