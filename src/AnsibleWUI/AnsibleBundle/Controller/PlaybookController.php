<?php

namespace AnsibleWUI\AnsibleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PlaybookController
 *
 * @package AnsibleWUI\AnsibleBundle\Controller
 */
class PlaybookController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AnsibleWUIAnsibleBundle:Default:index.html.twig');
    }
}
