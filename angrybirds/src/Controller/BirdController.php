<?php

namespace App\Controller;


use App\Entity\Bird;
use App\Repository\BirdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
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

    #[Route('/{id}', name: 'bird_single')]
    public function single(Bird $bird, BirdRepository $birdRepository)
    {
     
        return $this->render('bird/single.html.twig', [
            'bird' => $birdRepository->find($bird->getId()),
        ]);
    }

    #[Route('/download/calendar', name: 'bird_calendar')]
    public function calendar()
    {
      
        return $this->file('documents/angry_birds_2015_calendar.pdf', "Calendar.pdf", ResponseHeaderBag::DISPOSITION_ATTACHMENT);
    }

}
