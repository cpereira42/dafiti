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
     * @Route("/category", methods={"GET"})
     */
    public function getCategory(): Response
    {
        $CategoryList = $this->categoryrepository->findAll();
        return new JsonResponse($CategoryList);
    }

    /**
     * @Route("category/{id}", methods={"DELETE"})
     */
    public function removecat(int $id): Response
    {
        $item = $this->categoryrepository->find($id);
        $this->entityManager->remove($item);
        $this->entityManager->flush();
        return new Response ('Deleted',Response::HTTP_NO_CONTENT);
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
     * @Route("/item", methods={"GET"})
     */
    public function getItem(): Response
    {
        $ItemList = $this->itemrepository->findAll();
        return new JsonResponse($ItemList);
    }

    /**
     * @Route("/item/{id}", methods={"GET"})
     */
    public function getListItem($id): Response
    {
        $category = $this->categoryrepository->find($id);
        $listitem = $this->itemrepository->findBy(['category'=>$category]);
        return new JsonResponse($listitem);
    }

     /**
     * @Route("/item/info/{id}", methods={"GET"})
     */
    public function getInfoItem($id): Response
    {
        $infoitem = $this->itemrepository->find($id);
        return new JsonResponse($infoitem);
    }

    /**
     * @Route("item/{id}", methods={"DELETE"})
     */
    public function remove(int $id): Response
    {
        $item = $this->itemrepository->find($id);
        $this->entityManager->remove($item);
        $this->entityManager->flush();
        return new Response ('Deleted',Response::HTTP_NO_CONTENT);
    }
    
    /**
     * @Route("/item/{id}", methods={"PUT"})
     */
    public function Atualiza(int $id, Request $request): Response
    {
        $item = $this->itemrepository->find($id);
        $item->setQtt($request->get('qtt'));
        $item->setSize($request->get('size'));
        $item->setColor($request->get('color'));
        $item->setName($request->get('name'));
        $this->entityManager->persist($item);
        $this->entityManager->flush();
        $this->entityManager->flush();
        return new JsonResponse($item);
    }
    
    /**
    * @Route("/authe", methods={"GET"})
     */
    public function authe(Request $request) : Response
    {
        $email = $request->get('email');
        $password = $request->get('password');

        return new JsonResponse(['email'=>$email,'password'=>$email], Response::HTTP_OK);
    }
}
