<?php

namespace AnsibleWUI\UserBundle\Controller;

use AnsibleWUI\UserBundle\Entity\User;
use AnsibleWUI\UserBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController
 *
 * @package AnsibleWUI\UserBundle\Controller
 */
class UserController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        /**
         * @var User[] $users
         */
        $users = $this->getDoctrine()->getRepository('AnsibleWUIUserBundle:User')->findAll();

        return $this->render(
            'AnsibleWUIUserBundle:User:list.html.twig',
            [
                'users' => $users
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
        /**
         * @var User $user
         */
        $user = $this->getDoctrine()->getRepository('AnsibleWUIUserBundle:User')->find($id);

        return $this->render(
            'AnsibleWUIUserBundle:User:view.html.twig',
            [
                'user' => $user,
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
        $user = new User();

        return $this->showForm($request, $user);
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, $id)
    {
        /**
         * @var User $user
         */
        $user = $this->getDoctrine()->getRepository('AnsibleWUIUserBundle:User')->find($id);

        return $this->showForm($request, $user);
    }

    /**
     * @param Request $request
     * @param User    $user
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    private function showForm(Request $request, User $user)
    {
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            /**
             * @var SubmitButton $submit
             */
            $submit = $form->get('submit');
            if ($submit->isClicked()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                return $this->redirectToRoute('ansible_wui_user_list');
            }
        }
        return $this->render(
            'AnsibleWUIUserBundle:User:form.html.twig',
            [
                'user' => $user,
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
        /**
         * @var User $user
         */
        $user = $this->getDoctrine()->getRepository('AnsibleWUIUserBundle:User')->find($id);

        $em = $this->getDoctrine()->getManager();

        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('ansible_wui_user_list');
    }
}
