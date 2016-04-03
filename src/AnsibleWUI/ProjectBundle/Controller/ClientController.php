<?php

namespace AnsibleWUI\ProjectBundle\Controller;

use AnsibleWUI\CoreBundle\Controller\EntityController;
use AnsibleWUI\ProjectBundle\Entity\Client;
use AnsibleWUI\ProjectBundle\Form\Type\ClientType;

/**
 * Class ClientController
 *
 * @package AnsibleWUI\ProjectBundle\Controller
 */
class ClientController extends EntityController
{
    /**
     * @return Client
     */
    protected function newEntity()
    {
        return new Client();
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('AnsibleWUIProjectBundle:Client');
    }

    /**
     * @return mixed
     */
    protected function formType()
    {
        return ClientType::class;
    }

    /**
     * @param $object
     */
    protected function prePersist($object)
    {
        /**
         * @var Client $object
         */
        $object->setSlug(strtolower(str_replace(' ', '_', $object->getName())));
    }

    /**
     * @return array
     */
    protected function getRoutes()
    {
        return [
            'list'   => 'ansible_wui_client_list',
            'view'   => 'ansible_wui_client_view',
            'add'    => 'ansible_wui_client_add',
            'edit'   => 'ansible_wui_client_edit',
            'delete' => 'ansible_wui_client_delete',
        ];
    }

    /**
     * @return array
     */
    protected function getTemplates()
    {
        return [
            'list' => 'AnsibleWUIProjectBundle:Client:list.html.twig',
            'form' => 'AnsibleWUIProjectBundle:Client:form.html.twig',
            'view' => 'AnsibleWUIProjectBundle:Client:view.html.twig',
        ];
    }
}
