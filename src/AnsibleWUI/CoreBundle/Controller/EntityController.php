<?php

namespace AnsibleWUI\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EntityController
 *
 * @package AnsibleWUI\CoreBundle\Controller
 */
abstract class EntityController extends Controller
{
    /**
     * @return mixed
     */
    protected function newEntity()
    {
        return null;
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepository()
    {
        return null;
    }

    /**
     * @param $object
     */
    protected function prePersist($object)
    {
    }

    /**
     * @return array
     */
    protected function getRoutes()
    {
        return [];
    }

    /**
     * @return string
     */
    protected function formType()
    {
        return null;
    }

    /**
     * @param $type
     *
     * @return string
     */
    protected function getRoute($type)
    {
        $routes = $this->getRoutes();
        return isset($routes[$type]) ? $routes[$type] : null;
    }

    /**
     * @return array
     */
    protected function getTemplates()
    {
        return [];
    }

    /**
     * @param $type
     *
     * @return string
     */
    protected function getTemplate($type)
    {
        $templates = $this->getTemplates();
        return isset($templates[$type]) ? $templates[$type] : null;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $entities = $this->getRepository()->findAll();

        return $this->render(
            $this->getTemplate('list'),
            [
                'entities' => $entities
            ]
        );
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id)
    {
        $entity = $this->getRepository()->find($id);

        return $this->render(
            $this->getTemplate('view'),
            [
                'entity' => $entity,
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $entity = $this->newEntity();

        return $this->showForm($request, $entity);
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        $entity = $this->getRepository()->find($id);

        return $this->showForm($request, $entity);
    }

    /**
     * @param Request $request
     * @param Mixed   $entity
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    private function showForm(Request $request, $entity)
    {
        $form = $this->createForm($this->formType(), $entity);

        $form->handleRequest($request);

        if ($form->isValid()) {
            /**
             * @var SubmitButton $submit
             */
            $submit = $form->get('submit');
            if ($submit->isClicked()) {
                $em = $this->getDoctrine()->getManager();
                $this->prePersist($entity);
                $em->persist($entity);
                $em->flush();
                return $this->redirectToRoute($this->getRoute('list'));
            }
        }
        return $this->render(
            $this->getTemplate('form'),
            [
                'entity' => $entity,
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {
        $entity = $this->getRepository()->find($id);

        $em = $this->getDoctrine()->getManager();

        $em->remove($entity);
        $em->flush();

        return $this->redirectToRoute($this->getRoute('list'));
    }
}
