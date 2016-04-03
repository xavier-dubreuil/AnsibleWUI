<?php

namespace AnsibleWUI\AnsibleBundle\Controller;

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
}
