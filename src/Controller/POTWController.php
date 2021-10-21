<?php

namespace App\Controller;

use App\Repository\POTWRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class POTWController extends AbstractController
{
    #[Route('/potw', name: 'p_o_t_w')]
    public function index(POTWRepository $potwRepository): Response
    {
        $plays = $potwRepository->findAll();
        return $this->render('potw/index.html.twig', [
            'controller_name' => 'POTWController',
            'plays' => $plays,
        ]);
    }
}
