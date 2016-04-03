<?php

namespace AnsibleWUI\HostBundle\Controller;

use AnsibleWUI\CoreBundle\Controller\EntityController;
use AnsibleWUI\HostBundle\Entity\Host;
use AnsibleWUI\HostBundle\Form\Type\HostType;

/**
 * Class HostController
 *
 * @package AnsibleWUI\HostBundle\Controller
 */
class HostController extends EntityController
{
    /**
     * @return Host
     */
    protected function newEntity()
    {
        return new Host();
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('AnsibleWUIHostBundle:Host');
    }

    /**
     * @return mixed
     */
    protected function formType()
    {
        return HostType::class;
    }

    /**
     * @return array
     */
    protected function getRoutes()
    {
        return [
            'list'   => 'ansible_wui_host_list',
            'view'   => 'ansible_wui_host_view',
            'add'    => 'ansible_wui_host_add',
            'edit'   => 'ansible_wui_host_edit',
            'delete' => 'ansible_wui_host_delete',
        ];
    }

    /**
     * @return array
     */
    protected function getTemplates()
    {
        return [
            'list' => 'AnsibleWUIHostBundle:Host:list.html.twig',
            'form' => 'AnsibleWUIHostBundle:Host:form.html.twig',
            'view' => 'AnsibleWUIHostBundle:Host:view.html.twig',
        ];
    }
}
