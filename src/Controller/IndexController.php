<?php // src/Contoller/IndexController.php

namespace App\Controller;

use App\Config\PostStatus;
use App\Repository\MeetingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(MeetingRepository $meetingRepository): Response
    {
        $posts = $meetingRepository->findBy(['PostStatus' => PostStatus::PUBLIC], ['Date' => 'DESC']);
        return $this->render('page/meeting/index.html.twig', [
            'posts' => $posts,
            'title' => 'Meetings',
        ]);
    }

    #[Route('/forum', name: 'app_forum')]
    public function forum(): Response
    {
        return $this->redirect('https://forum.producermeeting.com/');
    }
}
