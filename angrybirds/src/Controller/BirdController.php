<?php

namespace App\Controller;


use App\Model\BirdModel;
use App\Repository\BirdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BirdController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(BirdRepository $birdRepository): Response
    {

        return $this->render('bird/index.html.twig', [
            'birds' => $birdRepository->findAll(),
        ]);
    }
}
