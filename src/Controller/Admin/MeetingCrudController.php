<?php

namespace App\Controller\Admin;

use App\Entity\Meeting;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
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
    }
}
