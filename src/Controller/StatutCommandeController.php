<?php

namespace App\Controller;

use App\Entity\StatutCommande;
use App\Form\StatutCommandeType;
use App\Repository\StatutCommandeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/statut/commande')]
class StatutCommandeController extends AbstractController
{
    #[Route('/', name: 'statut_commande_index', methods: ['GET'])]
    public function index(StatutCommandeRepository $statutCommandeRepository): Response
    {
        return $this->render('statut_commande/index.html.twig', [
            'statut_commandes' => $statutCommandeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'statut_commande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $statutCommande = new StatutCommande();
        $form = $this->createForm(StatutCommandeType::class, $statutCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($statutCommande);
            $entityManager->flush();

            return $this->redirectToRoute('statut_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statut_commande/new.html.twig', [
            'statut_commande' => $statutCommande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'statut_commande_show', methods: ['GET'])]
    public function show(StatutCommande $statutCommande): Response
    {
        return $this->render('statut_commande/show.html.twig', [
            'statut_commande' => $statutCommande,
        ]);
    }

    #[Route('/{id}/edit', name: 'statut_commande_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatutCommande $statutCommande, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(StatutCommandeType::class, $statutCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('statut_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statut_commande/edit.html.twig', [
            'statut_commande' => $statutCommande,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'statut_commande_delete', methods: ['POST'])]
    public function delete(Request $request, StatutCommande $statutCommande, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statutCommande->getId(), $request->request->get('_token'))) {
            $entityManager->remove($statutCommande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('statut_commande_index', [], Response::HTTP_SEE_OTHER);
    }
}
