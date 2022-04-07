<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use App\Entity\Contact;
use App\Entity\Directory;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(CardCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Carcy Webapp');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section();
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
        yield MenuItem::section();
        yield MenuItem::subMenu('Card');
        yield MenuItem::linkToCrud('Card', 'fas fa-list', Card::class);
        yield MenuItem::linkToCrud('Directory', 'fas fa-list', Directory::class);
        yield MenuItem::section();
        yield MenuItem::subMenu('Contact');
        yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);
    }
}
