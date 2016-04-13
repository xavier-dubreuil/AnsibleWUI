<?php

namespace AnsibleWUI\ProjectBundle\Controller;

use AnsibleWUI\ProjectBundle\Entity\Project;
use AnsibleWUI\ProjectBundle\Form\Type\ProjectType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProjectController
 *
 * @package AnsibleWUI\ProjectBundle\Controller
 */
class ProjectAPIController extends FOSRestController
{
    private function getManager()
    {
        return $this->get('project.manager');
    }


    public function getProjectAction($slug)
    {

        $project = $this->getManager()->getRepository()->find($slug);

        $view = $this->view($project, 200)
                     ->setTemplate('AnsibleWUIProjectBundle:Project:view.html.twig')
                     ->setTemplateVar('entity')
        ;

        return $this->handleView($view);
    }

    public function getProjectsAction(Request $request)
    {
        var_dump($request->attributes);die;

        $projects = $this->getManager()->getRepository()->findAll();

        $view = $this->view($projects, 200)
                     ->setTemplate('AnsibleWUIProjectBundle:Project:list.html.twig')
                     ->setTemplateVar('entities')
        ;

        return $this->handleView($view);
    }

    /**
     * @return Project
     */
    protected function newEntity()
    {
        return new Project();
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('AnsibleWUIProjectBundle:Project');
    }

    /**
     * @return mixed
     */
    protected function formType()
    {
        return ProjectType::class;
    }

    /**
     * @param $object
     */
    protected function prePersist($object)
    {
        /**
         * @var Project $object
         */
        $object->setSlug(strtolower(str_replace(' ', '_', $object->getName())));
    }

    /**
     * @return array
     */
    protected function getRoutes()
    {
        return [
            'list'   => 'ansible_wui_project_list',
            'view'   => 'ansible_wui_project_view',
            'add'    => 'ansible_wui_project_add',
            'edit'   => 'ansible_wui_project_edit',
            'delete' => 'ansible_wui_project_delete',
        ];
    }

    /**
     * @return array
     */
    protected function getTemplates()
    {
        return [
            'list' => 'AnsibleWUIProjectBundle:Project:list.html.twig',
            'form' => 'AnsibleWUIProjectBundle:Project:form.html.twig',
            'view' => 'AnsibleWUIProjectBundle:Project:view.html.twig',
        ];
    }
}
