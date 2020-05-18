<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\City;
use App\Entity\Project;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entity = $builder->getData();
        if (empty($entity->getPicture())) {
            $required = true;
            $picPlaceholder = 'Choisissez une image';
        } else {
            $required = false;
            $picPlaceholder = 'Vous pouvez modifier votre image ici';
        }

        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre :'
            ])
            ->add('pictureFile', FileType::class, [
                'label' => 'Image de couverture :',
                'mapped' => false,
                'attr' => [
                    'placeholder' => $picPlaceholder
                ],
                'required' => $required
            ])
            ->add('cost', MoneyType::class, [
                'label' => 'Coût du projet :',
            ])
            ->add('excerpt', TextType::class, [
                'label' => 'Description courte :'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description longue :'
            ])
            //->add('createdAt')
            //->add('user', HiddenType::class)
            ->add('city',EntityType::class, [
                'label' => 'Ville :',
                'class' => City::class,
                'multiple' => false,
                'expanded' => false
                ])
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'multiple' => true,
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
