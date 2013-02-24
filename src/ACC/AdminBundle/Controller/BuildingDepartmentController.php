<?php

namespace ACC\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ACC\AdminBundle\Entity\BuildingDepartment;
use ACC\AdminBundle\Form\BuildingDepartmentType;

/**
 * BuildingDepartment controller.
 *
 * @Route("/building_department")
 */
class BuildingDepartmentController extends Controller
{
    /**
     * Lists all BuildingDepartment entities.
     *
     * @Route("/", name="building_department")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ACCAdminBundle:BuildingDepartment')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a BuildingDepartment entity.
     *
     * @Route("/{id}/show", name="building_department_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:BuildingDepartment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BuildingDepartment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new BuildingDepartment entity.
     *
     * @Route("/new", name="building_department_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BuildingDepartment();
        $form   = $this->createForm(new BuildingDepartmentType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new BuildingDepartment entity.
     *
     * @Route("/create", name="building_department_create")
     * @Method("POST")
     * @Template("ACCAdminBundle:BuildingDepartment:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new BuildingDepartment();
        $form = $this->createForm(new BuildingDepartmentType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('building_department_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BuildingDepartment entity.
     *
     * @Route("/{id}/edit", name="building_department_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:BuildingDepartment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BuildingDepartment entity.');
        }

        $editForm = $this->createForm(new BuildingDepartmentType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing BuildingDepartment entity.
     *
     * @Route("/{id}/update", name="building_department_update")
     * @Method("POST")
     * @Template("ACCAdminBundle:BuildingDepartment:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ACCAdminBundle:BuildingDepartment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BuildingDepartment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BuildingDepartmentType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('building_department_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a BuildingDepartment entity.
     *
     * @Route("/{id}/delete", name="building_department_delete")
     * @Method("POST")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ACCAdminBundle:BuildingDepartment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BuildingDepartment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('building_department'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
