<?php

namespace App\Controller;

use App\Entity\TypePaiement;
use App\Form\TypePaiementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/paiement')]
class TypePaiementController extends AbstractController
{
    #[Route('/', name: 'type_paiement_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $typePaiements = $entityManager
            ->getRepository(TypePaiement::class)
            ->findAll();

        return $this->render('type_paiement/index.html.twig', [
            'type_paiements' => $typePaiements,
        ]);
    }

    #[Route('/new', name: 'type_paiement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typePaiement = new TypePaiement();
        $form = $this->createForm(TypePaiementType::class, $typePaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typePaiement);
            $entityManager->flush();

            return $this->redirectToRoute('type_paiement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_paiement/new.html.twig', [
            'type_paiement' => $typePaiement,
            'form' => $form,
        ]);
    }

    #[Route('/{idTypePaiement}', name: 'type_paiement_show', methods: ['GET'])]
    public function show(TypePaiement $typePaiement): Response
    {
        return $this->render('type_paiement/show.html.twig', [
            'type_paiement' => $typePaiement,
        ]);
    }

    #[Route('/{idTypePaiement}/edit', name: 'type_paiement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypePaiement $typePaiement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypePaiementType::class, $typePaiement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('type_paiement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_paiement/edit.html.twig', [
            'type_paiement' => $typePaiement,
            'form' => $form,
        ]);
    }

    #[Route('/{idTypePaiement}', name: 'type_paiement_delete', methods: ['POST'])]
    public function delete(Request $request, TypePaiement $typePaiement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typePaiement->getIdTypePaiement(), $request->request->get('_token'))) {
            $entityManager->remove($typePaiement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_paiement_index', [], Response::HTTP_SEE_OTHER);
    }
}
