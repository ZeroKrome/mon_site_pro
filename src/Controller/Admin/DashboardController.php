<?php

namespace App\Controller\Admin;

use App\Entity\Annexe;
use App\Entity\Contact;
use App\Entity\Media;
use App\Entity\Projet;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mon Site Pro');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Site internet');
        yield MenuItem::subMenu('Projets', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer un projet', 'fas fa-plus', Projet::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Projets', 'fas fa-eye', Projet::class)
        ]);
        yield MenuItem::subMenu('Contact', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer un Contact', 'fas fa-plus', Contact::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Projets', 'fas fa-eye', Contact::class)
        ]);
        yield MenuItem::section('Lien Annexe');
        yield MenuItem::subMenu('Images', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Voir les media', 'fas fa-eye', Media::class)
        ]);
        yield MenuItem::subMenu('Utilisateurs', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer un utilisateur', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les utilisateurs', 'fas fa-eye', User::class)
        ]);
        yield MenuItem::subMenu('Annexe', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Créer une annexe', 'fas fa-plus', Annexe::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les annexes', 'fas fa-eye', Annexe::class)
        ]);
    }
    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('admin');
    }
}
