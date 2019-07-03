<?php

namespace App\Form;

use App\Entity\Resultado;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResultadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('puntoslocal')
            ->add('puntosvisitante')
            ->add('cancha')
            ->add('fecha')
            ->add('equipolocal')
            ->add('equipovisitante')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Resultado::class,
        ]);
    }
}
