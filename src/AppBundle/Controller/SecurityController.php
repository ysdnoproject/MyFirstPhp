<?php
/**
 * Created by PhpStorm.
 * User: yuanshidong
 * Date: 16/4/5
 * Time: 上午9:07
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{

    /**
     * @Route("/login",name="user_login")
     */
    public function loginAction(){
        $helper=$this->get('security.authentication_utils');

        return $this->render('security/login.html.twig', array(
            // last username entered by the user (if any)
            'lastUserName' => $helper->getLastUsername(),
            // last authentication error (if any)
            'error' => $helper->getLastAuthenticationError(),
        ));
    }

    /**
     * @Route("/login_check", name="user_login_check")
     */
    public function checkAction()
    {
        throw new \Exception('checkAction should never be reached!');
    }

    /**
     * @Route("/logout", name="user_logout")
     */
    public function logoutAction()
    {
        throw new \Exception('logoutAction should never be reached');
    }
}