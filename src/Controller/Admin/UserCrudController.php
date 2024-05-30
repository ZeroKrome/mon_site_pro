<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'La liste des utilisateurs')
            ->setEntityLabelInSingular('un utilisateur');
    }



    public function configureFields(string $pageName): iterable
    {
        yield EmailField::new('email');
        yield ChoiceField::new('roles')->setChoices([
            'administrateur' => "ROLE_ADMIN",
            'utilisateur' => "ROLE_USER",
        ])
            ->setRequired(isRequired: false)
            ->renderAsBadges([
                'ROLE_ADMIN' => 'danger',
                'ROLE_USER' => 'success'
            ])
            ->allowMultipleChoices();
        // yield TextField::new('temporaryPassword', 'Mot de passe')->onlyOnForms()->setFormType(PasswordType::class)
        // ->setRequired(isRequired: true);
    }
}
