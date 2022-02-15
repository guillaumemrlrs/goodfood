<?php

namespace App\Controller;

use App\Entity\CommandeClient;
use App\Form\CommandeClientType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commande/client')]
class CommandeClientController extends AbstractController
{
    #[Route('/', name: 'commande_client_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $commandeClients = $entityManager
            ->getRepository(CommandeClient::class)
            ->findAll();

        return $this->render('commande_client/index.html.twig', [
            'commande_clients' => $commandeClients,
        ]);
    }

    #[Route('/new', name: 'commande_client_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commandeClient = new CommandeClient();
        $form = $this->createForm(CommandeClientType::class, $commandeClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commandeClient);
            $entityManager->flush();

            return $this->redirectToRoute('commande_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande_client/new.html.twig', [
            'commande_client' => $commandeClient,
            'form' => $form,
        ]);
    }

    #[Route('/{idCommande}', name: 'commande_client_show', methods: ['GET'])]
    public function show(CommandeClient $commandeClient): Response
    {
        return $this->render('commande_client/show.html.twig', [
            'commande_client' => $commandeClient,
        ]);
    }

    #[Route('/{idCommande}/edit', name: 'commande_client_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommandeClient $commandeClient, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CommandeClientType::class, $commandeClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('commande_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande_client/edit.html.twig', [
            'commande_client' => $commandeClient,
            'form' => $form,
        ]);
    }

    #[Route('/{idCommande}', name: 'commande_client_delete', methods: ['POST'])]
    public function delete(Request $request, CommandeClient $commandeClient, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commandeClient->getIdCommande(), $request->request->get('_token'))) {
            $entityManager->remove($commandeClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('commande_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
