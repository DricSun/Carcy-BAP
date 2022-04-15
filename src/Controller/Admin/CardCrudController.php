<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Card::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setDisabled(),
            TextField::new('name'),
            TextField::new('first_name'),
            ImageField::new('image_user')
                ->setUploadDir('public/uploads/image-user')
                ->setBasePath('uploads/images-user')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/jpeg, image/png'
                    ]
                ]),
        ];
    }

}
