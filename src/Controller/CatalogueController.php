<?php

namespace App\Controller;

use App\Entity\Catalogue;
use App\Form\CatalogueType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/catalogue')]
class CatalogueController extends AbstractController
{
    #[Route('/', name: 'catalogue_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $catalogues = $entityManager
            ->getRepository(Catalogue::class)
            ->findAll();

        return $this->render('catalogue/index.html.twig', [
            'catalogues' => $catalogues,
        ]);
    }

    #[Route('/new', name: 'catalogue_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $catalogue = new Catalogue();
        $form = $this->createForm(CatalogueType::class, $catalogue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($catalogue);
            $entityManager->flush();

            return $this->redirectToRoute('catalogue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('catalogue/new.html.twig', [
            'catalogue' => $catalogue,
            'form' => $form,
        ]);
    }

    #[Route('/{idMenu}', name: 'catalogue_show', methods: ['GET'])]
    public function show(Catalogue $catalogue): Response
    {
        return $this->render('catalogue/show.html.twig', [
            'catalogue' => $catalogue,
        ]);
    }

    #[Route('/{idMenu}/edit', name: 'catalogue_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Catalogue $catalogue, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CatalogueType::class, $catalogue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('catalogue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('catalogue/edit.html.twig', [
            'catalogue' => $catalogue,
            'form' => $form,
        ]);
    }

    #[Route('/{idMenu}', name: 'catalogue_delete', methods: ['POST'])]
    public function delete(Request $request, Catalogue $catalogue, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$catalogue->getIdMenu(), $request->request->get('_token'))) {
            $entityManager->remove($catalogue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('catalogue_index', [], Response::HTTP_SEE_OTHER);
    }
}
