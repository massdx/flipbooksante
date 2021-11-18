<?php

namespace App\Controller\Admin;

use App\Entity\Pub;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class PubCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pub::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $fichier =  TextareaField::new('fichier' , 'Image de la pub ')
        ->setFormType(FileType::class);

            $image =  ImageField::new('image' , 'Image de la pub ')
                ->setBasePath('/images/pubs/')
                ->setFormType(VichImageType::class);

            $field =   [

                TextField::new('titre','Titre de la publicité '),
                ChoiceField::new('position', 'Section ')->setChoices(fn () => [
                    'section 1' => 1,
                    'section 2' => 2,
                    'section 3' => 3,
                    'section 4' => 4,
                ]),
                AssociationField::new('pays')
                    ->setFormTypeOptions([
                       
                    ])
                   

            ];

            if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL) {

                $field[] = $image;

            }
            else
            {
                $field[] =  $fichier;
            }

            return $field ;
      
    }
    
}