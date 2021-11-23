<?php

namespace App\Controller;

use App\Model\BirdModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BirdController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(BirdModel $birdModel): Response
    {

        return $this->render('bird/index.html.twig', [
            'birds' => $birdModel->getBirds(),
        ]);
    }
}
