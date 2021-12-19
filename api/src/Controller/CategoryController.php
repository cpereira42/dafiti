<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ItemRepository;
use App\Entity\Category;
use App\Entity\Item;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @var EntityManagerInterface 
     */
    private $entityManager;
    

    /**
     * @var CategoryRepository 
     */
    private $categoryrepository;

    /**
     * @var ItemRepository 
     */
    private $itemrepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        CategoryRepository $categoryrepository,
        ItemRepository $itemrepository
        )
    {
        $this->entityManager = $entityManager;
        $this->itemrepository = $itemrepository;
        $this->categoryrepository = $categoryrepository;
    }



    /**
     * @Route("/category", methods={"POST"})
     */
    public function new_category(Request $request): Response
    {
        $name = $request->get('name');
        $category = new Category();
        $category->setName($name);
        $this->entityManager->persist($category);
        $this->entityManager->flush();
        return new JsonResponse($category);
    }

    /**
     * @Route("/item", methods={"POST"})
     */
    public function new_item(Request $request): Response
    {
        $item = new Item();
        $item->setName($request->get('name'));
        $category = $this->categoryrepository->find($request->get('category'));
        $item->setCategory($category);
        $item->setQtt($request->get('qtt'));
        $item->setSize($request->get('size'));
        $item->setColor($request->get('color'));
        $this->entityManager->persist($item);
        $this->entityManager->flush();
        return new JsonResponse($item);
    }

    /**
     * @Route("/category", methods={"GET"})
     */
    public function getCategory(): Response
    {
        $CategoryList = $this->categoryrepository->findAll();
        return new JsonResponse($CategoryList);
    }

    /**
    * @Route("/authe", methods={"GET"})
     */
    public function authe(Request $request) : Response
    {
        $email = $request->get('email');
        $password = $request->get('password');

        return new JsonResponse(['email'=>$email,'password'=>"password"], Response::HTTP_OK);
        //return $this->render('login.html');
    }
}
