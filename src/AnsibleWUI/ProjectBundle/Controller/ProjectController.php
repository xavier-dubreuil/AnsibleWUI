<?php

namespace AnsibleWUI\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
    public function indexAction()
    {
        return $this->render('AnsibleWUIProjectBundle:Project:index.html.twig');
    }
}
