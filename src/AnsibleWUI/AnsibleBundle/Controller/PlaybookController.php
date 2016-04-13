<?php

namespace AnsibleWUI\AnsibleBundle\Controller;

use AnsibleWUI\AnsibleBundle\Entity\Playbook;
use AnsibleWUI\AnsibleBundle\Form\Type\PlaybookType;
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

    public function addAction()
    {
        $playbook = new Playbook();

        $form = $this->createForm(PlaybookType::class, $playbook);

        return $this->render(
            'AnsibleWUIAnsibleBundle:Playbook:form.html.twig',
            [
                'entity' => $playbook,
                'form' => $form->createView(),
            ]
        );
    }

}
