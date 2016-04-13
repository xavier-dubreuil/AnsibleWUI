<?php

namespace AnsibleWUI\AnsibleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AnsibleType
 *
 * @package AnsibleWUI\AnsibleBundle\Form\Type
 */
class PlaybookType extends AbstractType
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
                'data_class'         => 'AnsibleWUI\AnsibleBundle\Entity\Playbook',
                'cascade_validation' => true,
            ]
        );
    }
}
