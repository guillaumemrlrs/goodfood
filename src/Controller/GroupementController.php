<?php

namespace App\Controller;

use App\Entity\Groupement;
use App\Form\GroupementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/groupement')]
class GroupementController extends AbstractController
{
    #[Route('/', name: 'groupement_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $groupements = $entityManager
            ->getRepository(Groupement::class)
            ->findAll();

        return $this->render('groupement/index.html.twig', [
            'groupements' => $groupements,
        ]);
    }

    #[Route('/new', name: 'groupement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $groupement = new Groupement();
        $form = $this->createForm(GroupementType::class, $groupement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($groupement);
            $entityManager->flush();

            return $this->redirectToRoute('groupement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('groupement/new.html.twig', [
            'groupement' => $groupement,
            'form' => $form,
        ]);
    }

    #[Route('/{idGroupement}', name: 'groupement_show', methods: ['GET'])]
    public function show(Groupement $groupement): Response
    {
        return $this->render('groupement/show.html.twig', [
            'groupement' => $groupement,
        ]);
    }

    #[Route('/{idGroupement}/edit', name: 'groupement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Groupement $groupement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GroupementType::class, $groupement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('groupement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('groupement/edit.html.twig', [
            'groupement' => $groupement,
            'form' => $form,
        ]);
    }

    #[Route('/{idGroupement}', name: 'groupement_delete', methods: ['POST'])]
    public function delete(Request $request, Groupement $groupement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$groupement->getIdGroupement(), $request->request->get('_token'))) {
            $entityManager->remove($groupement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('groupement_index', [], Response::HTTP_SEE_OTHER);
    }
}
