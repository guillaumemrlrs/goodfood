<?php

namespace App\Controller;

use App\Entity\TypeCommande;
use App\Form\TypeCommandeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/commande')]
class TypeCommandeController extends AbstractController
{
    #[Route('/', name: 'type_commande_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $typeCommandes = $entityManager
            ->getRepository(TypeCommande::class)
            ->findAll();

        return $this->render('type_commande/index.html.twig', [
            'type_commandes' => $typeCommandes,
        ]);
    }

    #[Route('/new', name: 'type_commande_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeCommande = new TypeCommande();
        $form = $this->createForm(TypeCommandeType::class, $typeCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeCommande);
            $entityManager->flush();

            return $this->redirectToRoute('type_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_commande/new.html.twig', [
            'type_commande' => $typeCommande,
            'form' => $form,
        ]);
    }

    #[Route('/{idTypeCommande}', name: 'type_commande_show', methods: ['GET'])]
    public function show(TypeCommande $typeCommande): Response
    {
        return $this->render('type_commande/show.html.twig', [
            'type_commande' => $typeCommande,
        ]);
    }

    #[Route('/{idTypeCommande}/edit', name: 'type_commande_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeCommande $typeCommande, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeCommandeType::class, $typeCommande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('type_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_commande/edit.html.twig', [
            'type_commande' => $typeCommande,
            'form' => $form,
        ]);
    }

    #[Route('/{idTypeCommande}', name: 'type_commande_delete', methods: ['POST'])]
    public function delete(Request $request, TypeCommande $typeCommande, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeCommande->getIdTypeCommande(), $request->request->get('_token'))) {
            $entityManager->remove($typeCommande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_commande_index', [], Response::HTTP_SEE_OTHER);
    }
}
