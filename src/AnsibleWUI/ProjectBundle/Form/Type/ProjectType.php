<?php

namespace AnsibleWUI\ProjectBundle\Form\Type;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class Type
 *
 * @package AnsibleWUI\ProjectBundle\Form\Type
 */
class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name',
            TextType::class,
            [
                'label'    => 'Name',
            ]
        );

        $builder->add(
            'client',
            EntityType::class,
            [
                'class' => 'AnsibleWUI\ProjectBundle\Entity\Client',
                'choice_label' => 'name',
                'placeholder' => 'Choose a client',
                'attr' => [
                    'data-tags' => '',
                ],
            ]
        );

        $builder->add(
            'submit',
            SubmitType::class,
            [
                'attr' => [
                    'class' => 'btn-sm btn-success',
                ],
            ]
        );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class'         => 'AnsibleWUI\ProjectBundle\Entity\Client',
                'cascade_validation' => true,
            ]
        );
    }
}
