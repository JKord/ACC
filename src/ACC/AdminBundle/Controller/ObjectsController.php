<?php

namespace ACC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ACC\AdminBundle\Entity\Objects;
use ACC\AdminBundle\Form\ObjectsType;

/**
 * Objects controller.
 *
 * @Route("/objects")
 */
class ObjectsController extends Controller
{
    /**
     * Lists all Objects entities.
     *
     * @Route("/", name="objects")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ACCAdminBundle:Objects')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Objects entity.
     *
     * @Route("/{id}/show", name="objects_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Objects')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Objects entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Objects entity.
     *
     * @Route("/new", name="objects_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Objects();
        $form   = $this->createForm(new ObjectsType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Objects entity.
     *
     * @Route("/create", name="objects_create")
     * @Method("POST")
     * @Template("ACCAdminBundle:Objects:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Objects();
        $form = $this->createForm(new ObjectsType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('objects_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Objects entity.
     *
     * @Route("/{id}/edit", name="objects_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Objects')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Objects entity.');
        }

        $editForm = $this->createForm(new ObjectsType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Objects entity.
     *
     * @Route("/{id}/update", name="objects_update")
     * @Method("POST")
     * @Template("ACCAdminBundle:Objects:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Objects')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Objects entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ObjectsType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('objects_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Objects entity.
     *
     * @Route("/{id}/delete", name="objects_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ACCAdminBundle:Objects')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Objects entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('objects'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
