<?php

namespace App\Form;

use App\Entity\MatchMaker;
use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class MatchMakerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('scorePlayerA', NumberType::class, array('attr' => array('class' => 'input')))
        ->add('scorePlayerB', NumberType::class, array('attr' => array('class' => 'input')))
        ->add('encounterDate', DateType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MatchMaker::class,
        ]);
    }
}
