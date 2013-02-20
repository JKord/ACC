<?php
namespace AGR\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
	Symfony\Component\HttpFoundation\Response,
	JMS\SecurityExtraBundle\Annotation\Secure;

use AGR\AdminBundle\Libraries\ODeskAPI,
	AGR\AdminBundle\Libraries\SpreadSheet,
	AGR\AdminBundle\Helper\oDeskApiManager,
	AGR\AdminBundle\Helper\GoogleDocsManager,
	AGR\AdminBundle\Helper\HelperMethod;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
	
	/**
	 * @Route("/", name="admin_index")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function indexAction()
	{		
		
				
		
		return array('location' => 'admin_index',
				     'data' 	=> null);
	}
	
	/**
	 * @Route("/tasks", name="admin_tasks")
	 * @Secure(roles="ROLE_ADMIN")
	 * @Template()
	 */
	public function tasksAction()
	{
		
	
		return array('location' => 'admin_tasks',
					 'tasks' 	=> $tasks);
	}
	
	/**
	 * @Route("/test", name="admin_test")
	 * @Secure(roles="ROLE_ADMIN")
	 */
	public function docsAction()
	{		
		print_r(date("l"));
	}
}
