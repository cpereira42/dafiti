<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Item;

class ItemController extends AbstractController
{
    /**
     * @Route("/itemr", methods={"POST"})
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
     *  @Route ("/itemr", methods ={"GET"})
     */
    public function getItem():Response
    {
        $CategoryList = $this->categoryrepository->findAll();
        return new JsonResponse($CategoryList);
    }
}
