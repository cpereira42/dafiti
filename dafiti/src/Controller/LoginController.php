<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    private $repository;
    private $enconder;

    public function __construct(
        UserRepository $repository,
        PasswordHasherFactoryInterface $enconder
        )
    {
        $this->repository = $repository;
        $this->enconder = $enconder;
    }
    /**
     * @Route("/use",methods={"GET"})
     */
    public function buscarTodos() : Response
    {

        $medico_list = $this->repository->findAll();
        return new JsonResponse($medico_list);
    }

    /**
     * @Route("/authentic", name="login")
     */
    public function index(Request $request)
    {
        $info = json_decode($request->getContent());
        if (is_null($info->email) || is_null($info->password))
            return new JsonResponse(['erro' => 'Favor enviar email e senha!'],Response::HTTP_BAD_REQUEST);
        $user = $this->repository->findOneBy(['email'=> $info->email]);
        return new JsonResponse(['acess'=>$user]);
        
        if (!$this->enconder->isPasswordValid($user, $info->password))
            return new JsonResponse(['erro' => 'Usuário ou senha inválidos!'],Response::HTTP_UNAUTHORIZED);
        $token = JWT::encode(['email'=>$user->getEmail(),'chave']);
        return new JsonResponse(['acess'=>$token]);
    }
}