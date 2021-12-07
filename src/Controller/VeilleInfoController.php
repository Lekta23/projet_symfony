<?php

namespace App\Controller;

use App\Repository\VeilleInfoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VeilleInfoController extends AbstractController
{
    #[Route('/veilleinfo', name: 'veille_info')]
    public function index(VeilleInfoRepository $veilleInfoRepository): Response
    {
        return $this->render('veille_info/index.html.twig', [
            'veilleinfos' => $veilleInfoRepository->findAll(),
        ]);
    }
}
