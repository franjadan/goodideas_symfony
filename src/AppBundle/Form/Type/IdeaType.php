<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Idea;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdeaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', null, [
                'label' => 'Título'
            ])
            ->add('descripcion', null, [
                'label' => 'Descripción de la idea',

            ])
            ->add('autor', null, [
                'label' => 'Propuesta por'
            ])
            ->add('fechaPropuesta', null, [
                'label' => 'Fecha de la propuesta',
                'widget' => 'single_text'
            ])
            ->add('fechaAprobacion', null, [
                'label' => 'Fecha de la aprobación',
                'widget' => 'single_text',
                'required' => false
            ])
            ->add('fechaRechazo', null, [
                'label' => 'Fecha del rechazo',
                'widget' => 'single_text',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Idea::class,
        ]);
    }
}
