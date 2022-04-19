<?php

namespace App\Controller;

use App\Repository\CardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CardController extends AbstractController
{
    #[Route('/card/{id}', name: 'app_card')]
    public function index(CardRepository $cardRepository, Request $request , $id ): Response
    {
        return $this->render('card/index.html.twig', [
            'card' => $cardRepository->find($id)
        ]);
    }
}

