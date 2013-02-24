<?php

namespace ACC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ACC\AdminBundle\Entity\Groups;
use ACC\AdminBundle\Form\GroupsType;

/**
 * Groups controller.
 *
 * @Route("/groups")
 */
class GroupsController extends Controller
{
    /**
     * Lists all Groups entities.
     *
     * @Route("/", name="groups")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ACCAdminBundle:Groups')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Groups entity.
     *
     * @Route("/{id}/show", name="groups_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Groups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groups entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Groups entity.
     *
     * @Route("/new", name="groups_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Groups();
        $form   = $this->createForm(new GroupsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Groups entity.
     *
     * @Route("/create", name="groups_create")
     * @Method("POST")
     * @Template("ACCAdminBundle:Groups:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Groups();
        $form = $this->createForm(new GroupsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('groups_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Groups entity.
     *
     * @Route("/{id}/edit", name="groups_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Groups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groups entity.');
        }

        $editForm = $this->createForm(new GroupsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Groups entity.
     *
     * @Route("/{id}/update", name="groups_update")
     * @Method("POST")
     * @Template("ACCAdminBundle:Groups:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Groups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groups entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new GroupsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('groups_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Groups entity.
     *
     * @Route("/{id}/delete", name="groups_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ACCAdminBundle:Groups')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Groups entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('groups'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
