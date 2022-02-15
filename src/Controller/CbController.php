<?php

namespace App\Controller;

use App\Entity\Cb;
use App\Form\CbType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cb')]
class CbController extends AbstractController
{
    #[Route('/', name: 'cb_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cbs = $entityManager
            ->getRepository(Cb::class)
            ->findAll();

        return $this->render('cb/index.html.twig', [
            'cbs' => $cbs,
        ]);
    }

    #[Route('/new', name: 'cb_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cb = new Cb();
        $form = $this->createForm(CbType::class, $cb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cb);
            $entityManager->flush();

            return $this->redirectToRoute('cb_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cb/new.html.twig', [
            'cb' => $cb,
            'form' => $form,
        ]);
    }

    #[Route('/{idCb}', name: 'cb_show', methods: ['GET'])]
    public function show(Cb $cb): Response
    {
        return $this->render('cb/show.html.twig', [
            'cb' => $cb,
        ]);
    }

    #[Route('/{idCb}/edit', name: 'cb_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cb $cb, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CbType::class, $cb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('cb_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cb/edit.html.twig', [
            'cb' => $cb,
            'form' => $form,
        ]);
    }

    #[Route('/{idCb}', name: 'cb_delete', methods: ['POST'])]
    public function delete(Request $request, Cb $cb, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cb->getIdCb(), $request->request->get('_token'))) {
            $entityManager->remove($cb);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cb_index', [], Response::HTTP_SEE_OTHER);
    }
}
