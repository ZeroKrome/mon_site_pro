<?php

namespace App\Controller\Admin;

use App\Entity\Annexe;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class AnnexeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annexe::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('un lien annexe')
            ->setEntityLabelInPlural('des liens annexes');
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');

        yield TextField::new('url')
            ->onlyOnForms()
            ->setHelp('URL du lien annexe (optionnel si vous téléchargez un fichier ou ajoutez du contenu)');

        yield TextareaField::new('file')
            ->setFormType(VichFileType::class)
            ->onlyOnForms()
            ->setHelp('Téléchargez un fichier PDF (optionnel si vous ajoutez une URL ou du contenu)');

        yield TextEditorField::new('contenu', 'Du contenu')
            ->setTrixEditorConfig([
                'blockAttributes' => [
                    'default' => ['tagName' => 'p'],
                ],
            ])
            ->onlyOnForms()
            ->setHelp('Contenu textuel pour le lien annexe (optionnel si vous ajoutez une URL ou téléchargez un fichier)');

        yield DateTimeField::new('createdAt')
            ->setFormTypeOption('disabled', true)
            ->hideOnForm()
            ->setLabel('Créé le');

        yield DateTimeField::new('updatedAt')
            ->setFormTypeOption('disabled', true)
            ->hideOnForm()
            ->setLabel('Mis à jour le');

        yield ImageField::new('filename')
            ->setBasePath('/uploads/pdf')
            ->onlyOnIndex()
            ->setLabel('Fichier');
    }
}
