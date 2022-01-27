<?php

namespace App\Controller;

use App\Entity\Movimentacao;
use App\Form\MovimentacaoType;
use App\Repository\MovimentacaoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/movimentacao')]
class MovimentacaoController extends AbstractController
{
    #[Route('/', name: 'movimentacao_index', methods: ['GET'])]
    public function index(MovimentacaoRepository $movimentacaoRepository): Response
    {
        return $this->render('movimentacao/index.html.twig', [
            'movimentacaos' => $movimentacaoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'movimentacao_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $movimentacao = new Movimentacao();
        $form = $this->createForm(MovimentacaoType::class, $movimentacao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($movimentacao);
            $entityManager->flush();

            return $this->redirectToRoute('movimentacao_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('movimentacao/new.html.twig', [
            'movimentacao' => $movimentacao,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'movimentacao_show', methods: ['GET'])]
    public function show(Movimentacao $movimentacao): Response
    {
        return $this->render('movimentacao/show.html.twig', [
            'movimentacao' => $movimentacao,
        ]);
    }

    #[Route('/{id}/edit', name: 'movimentacao_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Movimentacao $movimentacao, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MovimentacaoType::class, $movimentacao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('movimentacao_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('movimentacao/edit.html.twig', [
            'movimentacao' => $movimentacao,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'movimentacao_delete', methods: ['POST'])]
    public function delete(Request $request, Movimentacao $movimentacao, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$movimentacao->getId(), $request->request->get('_token'))) {
            $entityManager->remove($movimentacao);
            $entityManager->flush();
        }

        return $this->redirectToRoute('movimentacao_index', [], Response::HTTP_SEE_OTHER);
    }
}
