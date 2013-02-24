<?php

namespace ACC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ACC\AdminBundle\Entity\Workers;
use ACC\AdminBundle\Form\WorkersType;

/**
 * Workers controller.
 *
 * @Route("/workers")
 */
class WorkersController extends Controller
{
    /**
     * Lists all Workers entities.
     *
     * @Route("/", name="workers")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ACCAdminBundle:Workers')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Workers entity.
     *
     * @Route("/{id}/show", name="workers_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Workers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Workers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Workers entity.
     *
     * @Route("/new", name="workers_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Workers();
        $form   = $this->createForm(new WorkersType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Workers entity.
     *
     * @Route("/create", name="workers_create")
     * @Method("POST")
     * @Template("ACCAdminBundle:Workers:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Workers();
        $form = $this->createForm(new WorkersType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('workers_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Workers entity.
     *
     * @Route("/{id}/edit", name="workers_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Workers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Workers entity.');
        }

        $editForm = $this->createForm(new WorkersType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Workers entity.
     *
     * @Route("/{id}/update", name="workers_update")
     * @Method("POST")
     * @Template("ACCAdminBundle:Workers:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Workers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Workers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new WorkersType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('workers_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Workers entity.
     *
     * @Route("/{id}/delete", name="workers_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ACCAdminBundle:Workers')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Workers entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('workers'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
