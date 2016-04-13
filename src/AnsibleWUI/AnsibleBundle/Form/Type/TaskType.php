<?php

namespace AnsibleWUI\AnsibleBundle\Form\Type;

use AnsibleWUI\AnsibleBundle\Entity\Module;
use AnsibleWUI\AnsibleBundle\Entity\Task;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class TaskType
 *
 * @package AnsibleWUI\AnsibleBundle\Form\Type
 */
class TaskType extends AbstractType
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var
     */
    private $type;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    private function loadDefaultsSnippets(Task $entity, $module)
    {
        /**
         * @var Module $module
         */
        $module = $this->entityManager->getRepository('AnsibleWUIAnsibleBundle:Module')->findOneBy(
            [
                'action' => $module,
            ]
        );

        $entity->setSnippets($module->getSnippets());
        dump($entity->getSnippets());
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if (isset($options['data'])) {
            $this->loadDefaultsSnippets($options['data'], $options['module']);
        }

        $builder->add(
            'type',
            HiddenType::class
        );

        $builder->add(
            'snippets',
            CollectionType::class,
            [
                'entry_type' => TextType::class,
                'entry_options' => [
                    'label' => 'Snippets',
                ]
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
                'module'             => null,
                'data_class'         => 'AnsibleWUI\AnsibleBundle\Entity\Task',
                'cascade_validation' => true,
            ]
        );

        $resolver->setRequired(
            [
                'module'
            ]
        );
    }
}
