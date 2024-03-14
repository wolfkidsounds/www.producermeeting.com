<?php // src/Controller/MeetingController.php

namespace App\Controller;

use App\Config\PostStatus;
use App\Entity\Enrollment;
use App\Form\EnrollmentFormType;
use App\Repository\MeetingRepository;
use App\Repository\EnrollmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MeetingController extends AbstractController
{
    #[Route('/meeting/{slug}', name: 'app_meeting_single', methods: ['GET', 'POST'])]
    public function meetingSingle(Request $request, string $slug, MeetingRepository $meetingRepository, EnrollmentRepository $enrollmentRepository, EntityManagerInterface $entityManager): Response
    {
        $post = $meetingRepository->findOneBy(['Slug' => $slug, 'PostStatus' => PostStatus::PUBLIC]);
        
        $enrollment = new Enrollment();
        $form = $this->createForm(EnrollmentFormType::class, $enrollment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $enrollment->setMeeting($post);

            $existingEnrollment = $enrollmentRepository->findOneBy(['Mail' => $enrollment->getMail(), 'Meeting' => $post]);

            if ($existingEnrollment) {

                notyf()
                    ->position('x', 'center')
                    ->position('y', 'top')
                    ->addWarning($enrollment->getMail() . ' existiert bereits, vermutlich bist du bereits angemeldet.');
                
                return $this->redirect($request->getUri());
            }

            $entityManager->persist($enrollment);
            $entityManager->flush();

            notyf()
                ->position('x', 'center')
                ->position('y', 'top')
                ->addSuccess('Du wurdest mit ' . $enrollment->getMail() . 'angemeldet!')
            ;
            
            return $this->redirect($request->getUri());
        }

        return $this->render('page/meeting/single.html.twig', [
            'form' => $form,
            'post' => $post,
            'title' => $post->getSpeaker()->getName(),
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/meeting/{slug}/enrollments', name: 'app_meeting_single_enrollments', methods: ['GET'])]
    public function meetingSingleEnrollments(string $slug, MeetingRepository $meetingRepository, EnrollmentRepository $enrollmentRepository): Response
    {
        $post = $meetingRepository->findOneBy(['Slug' => $slug, 'PostStatus' => PostStatus::PUBLIC]);
        $enrollments = $enrollmentRepository->findBy(['Meeting' => $post]);

        return $this->render('page/meeting/single_enrollments.html.twig', [
            'enrollments' => $enrollments,
            'post' => $post,
            'title' => $post->getSpeaker()->getName(),
        ]);
    }
}
