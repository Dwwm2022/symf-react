<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('libelle', 'Libellé'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR'),
            DateTimeField::new('createdAt', 'Créé le')->setFormat('dd-MM-Y HH:mm')->renderAsText(),
            //DateTimeField::new('createdAt')->renderAsText(),
            TextEditorField::new('description', 'Description'),
            AssociationField::new('category', 'La catégorie')
            
        ];
    }
    
}
