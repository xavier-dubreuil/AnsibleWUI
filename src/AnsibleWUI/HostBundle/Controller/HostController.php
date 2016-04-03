<?php

namespace AnsibleWUI\HostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class HostController
 *
 * @package AnsibleWUI\HostBundle\Controller
 */
class HostController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AnsibleWUIHostBundle:Host:index.html.twig');
    }
}
