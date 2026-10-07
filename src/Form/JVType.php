<?php

namespace App\Form;

use App\Entity\Genre;
use App\Entity\JV;
use App\Entity\Plateforme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JVType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('Date_Sortie')
            ->add('description')
            ->add('Detail')
            ->add('id_genre', EntityType::class, [
                'class' => Genre::class,
                'choice_label' => 'nom',
            ])
            ->add('id_plateforme', EntityType::class, [
                'class' => Plateforme::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
            ->add('Image')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JV::class,
        ]);
    }
}
