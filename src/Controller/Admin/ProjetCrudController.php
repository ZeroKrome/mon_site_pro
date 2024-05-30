<?php

namespace App\Controller\Admin;

use App\Form\ImageType;
use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'La liste des projets')
            ->setEntityLabelInSingular('un projet');
    }




    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom', 'Nom du projet');
        yield TextField::new('lien', 'Lien du projet')->hideOnIndex();
        yield BooleanField::new('enAvant', "Mettre en avant ?");
        yield ImageField::new('media')
            ->setBasePath('/images')
            ->onlyOnIndex();
        yield TextareaField::new('media', 'Image du projet')
            ->setFormType(ImageType::class)
            ->setRequired($pageName === Crud::PAGE_NEW)
            ->onlyOnForms();
    }
}
