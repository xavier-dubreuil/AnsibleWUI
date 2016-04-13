<?php

namespace AnsibleWUI\AnsibleBundle\Controller;

use AnsibleWUI\AnsibleBundle\Entity\Task;
use AnsibleWUI\AnsibleBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class TaskController
 *
 * @package AnsibleWUI\AnsibleBundle\Controller
 */
class TaskController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AnsibleWUIAnsibleBundle:Default:index.html.twig');
    }

    public function addAction($module)
    {
        $task = new Task();

        $form = $this->createForm(TaskType::class, $task, ['module' => $module]);

        return $this->render(
            'AnsibleWUIAnsibleBundle:Task:form.html.twig',
            [
                'entity' => $task,
                'form' => $form->createView(),
            ]
        );
    }

}
