<?php

namespace ACC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ACC\AdminBundle\Entity\Categories;
use ACC\AdminBundle\Form\CategoriesType;

/**
 * Categories controller.
 *
 * @Route("/categories")
 */
class CategoriesController extends Controller
{
    /**
     * Lists all Categories entities.
     *
     * @Route("/", name="categories")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ACCAdminBundle:Categories')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Categories entity.
     *
     * @Route("/{id}/show", name="categories_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Categories')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categories entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new Categories entity.
     *
     * @Route("/new", name="categories_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Categories();
        $form   = $this->createForm(new CategoriesType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Categories entity.
     *
     * @Route("/create", name="categories_create")
     * @Method("POST")
     * @Template("ACCAdminBundle:Categories:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Categories();
        $form = $this->createForm(new CategoriesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('categories_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Categories entity.
     *
     * @Route("/{id}/edit", name="categories_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Categories')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categories entity.');
        }

        $editForm = $this->createForm(new CategoriesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Categories entity.
     *
     * @Route("/{id}/update", name="categories_update")
     * @Method("POST")
     * @Template("ACCAdminBundle:Categories:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:Categories')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categories entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CategoriesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('categories_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Categories entity.
     *
     * @Route("/{id}/delete", name="categories_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ACCAdminBundle:Categories')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Categories entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('categories'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
