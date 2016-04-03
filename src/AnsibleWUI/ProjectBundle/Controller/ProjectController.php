<?php

namespace AnsibleWUI\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ProjectController
 *
 * @package AnsibleWUI\ProjectBundle\Controller
 */
class ProjectController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AnsibleWUIProjectBundle:Project:index.html.twig');
    }
}
