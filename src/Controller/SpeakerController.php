<?php // src/Controller/SpeakerController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/speaker', name: 'app_speaker')]
class SpeakerController extends AbstractController
{
    #[Route('/', name: 'app_speaker_index')]
    public function index(): Response
    {
        return $this->render('meeting/index.html.twig', [
            'controller_name' => 'SpeakerController',
        ]);
    }

    #[Route('/{slug}', name: 'app_speaker_single')]
    public function speakerSingle(): Response
    {
        return $this->render('meeting/index.html.twig', [
            'controller_name' => 'SpeakerController',
        ]);
    }
}
