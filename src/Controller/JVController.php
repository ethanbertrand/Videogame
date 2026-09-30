<?php

namespace App\Controller;

use App\Entity\JV;
use App\Form\JVType;
use App\Repository\JVRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/jv')]
final class JVController extends AbstractController
{
    #[Route(name: 'app_j_v_index', methods: ['GET'])]
    public function index(JVRepository $jVRepository): Response
    {
        return $this->render('jv/index.html.twig', [
            'j_vs' => $jVRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_j_v_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $jV = new JV();
        $form = $this->createForm(JVType::class, $jV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($jV);
            $entityManager->flush();

            return $this->redirectToRoute('app_j_v_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jv/new.html.twig', [
            'j_v' => $jV,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_j_v_show', methods: ['GET'])]
    public function show(JV $jV): Response
    {
        return $this->render('jv/show.html.twig', [
            'j_v' => $jV,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_j_v_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, JV $jV, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(JVType::class, $jV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_j_v_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('jv/edit.html.twig', [
            'j_v' => $jV,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_j_v_delete', methods: ['POST'])]
    public function delete(Request $request, JV $jV, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$jV->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($jV);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_j_v_index', [], Response::HTTP_SEE_OTHER);
    }
}
