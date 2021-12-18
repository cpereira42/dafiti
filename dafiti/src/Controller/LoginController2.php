<?php
 namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class LoginController2  extends AbstractController
{
    
    /**
    * @Route("/login")
     */
     public function LoginAction()
     {
        return $this->render('Login.html.twig');
        //return $this->render('login.html');
     }
     /**
    * @Route("/authenticator")
     */
    public function authe()
    {
        echo ("ola mundo");
        exit();
        //return $this->render('Login.html.twig');
       //return $this->render('login.html');
    }
}