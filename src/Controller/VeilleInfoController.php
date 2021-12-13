<?php

namespace App\Controller;

use App\Entity\VeilleInfo;
use App\Form\VeilleInfoType;
use App\Repository\VeilleInfoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/veilleinfo')]
class VeilleInfoController extends AbstractController
{
    #[Route('/', name: 'veille_info_index', methods: ['GET'])]
    public function index(VeilleInfoRepository $veilleInfoRepository): Response
    {
        return $this->render('veille_info/index.html.twig', [
            'veille_infos' => $veilleInfoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'veille_info_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $veilleInfo = new VeilleInfo();
        $form = $this->createForm(VeilleInfoType::class, $veilleInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($veilleInfo);
            $entityManager->flush();

            return $this->redirectToRoute('veille_info_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('veille_info/new.html.twig', [
            'veille_info' => $veilleInfo,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'veille_info_show', methods: ['GET'])]
    public function show(VeilleInfo $veilleInfo): Response
    {
        return $this->render('veille_info/show.html.twig', [
            'veille_info' => $veilleInfo,
        ]);
    }

    #[Route('/{id}/edit', name: 'veille_info_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, VeilleInfo $veilleInfo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VeilleInfoType::class, $veilleInfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('veille_info_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('veille_info/edit.html.twig', [
            'veille_info' => $veilleInfo,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'veille_info_delete', methods: ['POST'])]
    public function delete(Request $request, VeilleInfo $veilleInfo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$veilleInfo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($veilleInfo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('veille_info_index', [], Response::HTTP_SEE_OTHER);
    }
}
