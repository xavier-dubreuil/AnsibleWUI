<?php

namespace AnsibleWUI\HostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class HostUserController
 *
 * @package AnsibleWUI\HostBundle\Controller
 */
class HostUserController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AnsibleWUIHostBundle:HostUser:index.html.twig');
    }
}
