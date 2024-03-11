<?php

namespace App\Controller\Admin;

use App\Entity\Host;
use App\Entity\User;
use App\Entity\Meeting;
use App\Entity\Speaker;
use App\Entity\Location;
use App\Entity\Material;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->addFormTheme('@EasyMedia/form/easy-media.html.twig')
        ;
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Producer Meeting');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Meetings');
        yield MenuItem::linkToCrud('Meetings', 'fas fa-calendar-days', Meeting::class);
        yield MenuItem::linkToCrud('Speaker', 'fas fa-person', Speaker::class);
        yield MenuItem::linkToCrud('Materials', 'fas fa-file', Material::class);
        
        yield MenuItem::section('Other');
        yield MenuItem::linkToCrud('Locations', 'fas fa-location-dot', Location::class);
        yield MenuItem::linkToCrud('Hosts', 'fas fa-home', Host::class);
        
        yield MenuItem::section('System');
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
    }
}
