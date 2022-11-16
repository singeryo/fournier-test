<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EmployeeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Employee::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Employé')
            ->setEntityLabelInPlural('Employés')
            ->setSearchFields(['name', 'firstname', 'address', 'phone', 'passions'])
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nom');
        yield TextField::new('firstname', 'Prénom');
        yield TextField::new('address', 'Adresse');
        yield TelephoneField::new('phone', 'Téléphone');
        yield ChoiceField::new('passions', 'Liste des passions')
            ->allowMultipleChoices()
            ->autocomplete()
            ->setChoices([
                'Arts' => 'arts',
                'Sports' => 'sports',
                'Musique' => 'musique',
                'Jeux vidéo' => 'video-games',
                'Jeux de société' => 'board-games',
                'Voyages' => 'travel',
                'Méditation' => 'meditate',
                'Lecture' => 'reading',
                'Culture' => 'culture',
                'Business' => 'business',
                'Technologies' => 'tech',
                'Cuisine' => 'cooking'
            ])
        ;
        yield AssociationField::new('service');
    }

}
