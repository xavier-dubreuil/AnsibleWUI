<?php

namespace AnsibleWUI\UserBundle\Controller;

use AnsibleWUI\CoreBundle\Controller\EntityController;
use AnsibleWUI\UserBundle\Entity\User;
use AnsibleWUI\UserBundle\Form\Type\UserType;

/**
 * Class UserController
 *
 * @package AnsibleWUI\UserBundle\Controller
 */
class UserController extends EntityController
{

    /**
     * @return User
     */
    protected function newEntity()
    {
        return new User();
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepository()
    {
        return $this->getDoctrine()->getRepository('AnsibleWUIUserBundle:User');
    }

    /**
     * @return mixed
     */
    protected function formType()
    {
        return UserType::class;
    }

    /**
     * @return array
     */
    protected function getRoutes()
    {
        return [
            'list'   => 'ansible_wui_useruser_list',
            'view'   => 'ansible_wui_user_view',
            'add'    => 'ansible_wui_user_add',
            'edit'   => 'ansible_wui_user_edit',
            'delete' => 'ansible_wui_user_delete',
        ];
    }

    /**
     * @return array
     */
    protected function getTemplates()
    {
        return [
            'list' => 'AnsibleWUIUserBundle:User:list.html.twig',
            'form' => 'AnsibleWUIUserBundle:User:form.html.twig',
            'view' => 'AnsibleWUIUserBundle:User:view.html.twig',
        ];
    }
}
