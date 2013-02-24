<?php
namespace ACC\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
 	Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
 	Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Security\Core\SecurityContext;

/**
 * @Route("/admin/auth")
 */
class AuthController extends Controller
{
	/**
	 * @Route("/login", name="admin_auth_login")
	 * @Template()
	 */
	public function loginAction()
	{ 
		$sec = $this->get('security.context');
		//РџРµСЂРІС–СЂРєР° РЅР° Р°РІС‚РѕСЂРёР·РѕРІР°РЅРѕРіРѕ Р°РґРјС–РЅР°
		if($sec->isGranted('ROLE_ADMIN'))
			return $this->redirect($this->generateUrl('admin_index'));
		
		$request = $this->getRequest();
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }    
        
        return array(
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );     
		
		return array();
	}
	
	/**
	 * @Route("/login_check", name="admin_auth_check")
	 */
	public function securityCheckAction()
	{
		//РђСѓС‚РµРЅС‚РёС„С–РєР°С†С–С—.
		//РџРѕС‚СЂС–Р±РµРЅ РґР»СЏ СЃРёСЃС‚РµРјРё security Symfony.
	}
	
	/**
	 * @Route("/logout", name="admin_auth_logout")
	 */
	public function logoutAction()
	{
	
		return array();
	}
}
