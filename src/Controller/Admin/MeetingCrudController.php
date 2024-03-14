<?php

namespace App\Controller\Admin;

use App\Entity\Meeting;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Adeliom\EasyMediaBundle\Admin\Field\EasyMediaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MeetingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Meeting::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addFieldset('General');
        yield AssociationField::new('Speaker')
        ->setColumns(3);
        yield AssociationField::new('Location')
        ->setColumns(3);
        yield AssociationField::new('Host')
        ->hideOnIndex()
        ->setColumns(3);
        yield ChoiceField::new('MeetingStatus', 'Meeting Status')
        ->renderAsBadges()
        ->setColumns(3);
        yield FormField::addRow();
        yield TextField::new('Slug')
        ->hideOnIndex();

        yield FormField::addRow();
        yield EasyMediaField::new('Image')
        ->setFormTypeOption("restrictions_uploadTypes", ["image/*"])
        ->setColumns(8);

        yield FormField::addFieldset('Time');
        yield DateTimeField::new('Date');
        yield DateField::new('scheduledAt')
        ->hideOnIndex();

        yield FormField::addFieldset('Meta');
        yield DateField::new('createdAt')
        ->hideOnIndex()
        ->setColumns(1)
        ->setDisabled();
        yield DateField::new('editedAt')
        ->hideOnIndex()
        ->setColumns(1)
        ->setDisabled();
        yield DateField::new('publishedAt')
        ->hideOnIndex()
        ->setColumns(1)
        ->setDisabled();

        yield FormField::addRow();
        yield ChoiceField::new('PostStatus', 'Post Status')
        ->renderAsBadges()
        ->setColumns(2);

        yield FormField::addFieldset('Meta');
        yield AssociationField::new('Enrollments', 'Enrollments')
        ->hideOnIndex()
        ->hideOnForm();
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            //->add(Crud::PAGE_INDEX, )
        ;
    }
}
