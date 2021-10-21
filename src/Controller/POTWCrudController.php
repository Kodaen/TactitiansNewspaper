<?php

namespace App\Controller;

use App\Entity\POTW;
use App\Form\POTWType;
use App\Repository\POTWRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//#[Route('/POTWcrud')]
class POTWCrudController extends AbstractController
{
    #[Route('/admin/POTWcrud', name: 'p_o_t_w_crud_index', methods: ['GET'])]
    public function index(POTWRepository $pOTWRepository): Response
    {
        return $this->render('potw_crud/index.html.twig', [
            'p_o_t_ws' => $pOTWRepository->findAll(),
        ]);
    }

    #[Route('/admin/POTWcrud/new', name: 'p_o_t_w_crud_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $pOTW = new POTW();
        $form = $this->createForm(POTWType::class, $pOTW);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pOTW);
            $entityManager->flush();

            return $this->redirectToRoute('p_o_t_w_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('potw_crud/new.html.twig', [
            'p_o_t_w' => $pOTW,
            'form' => $form,
        ]);
    }

    #[Route('/POTWcrud/{id}', name: 'p_o_t_w_crud_show', methods: ['GET'])]
    public function show(POTW $pOTW): Response
    {
        return $this->render('potw_crud/show.html.twig', [
            'p_o_t_w' => $pOTW,
        ]);
    }

    #[Route('/admin/POTWcrud/{id}/edit', name: 'p_o_t_w_crud_edit', methods: ['GET','POST'])]
    public function edit(Request $request, POTW $pOTW): Response
    {
        $form = $this->createForm(POTWType::class, $pOTW);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('p_o_t_w_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('potw_crud/edit.html.twig', [
            'p_o_t_w' => $pOTW,
            'form' => $form,
        ]);
    }

    #[Route('/admin/POTWcrud/{id}', name: 'p_o_t_w_crud_delete', methods: ['POST'])]
    public function delete(Request $request, POTW $pOTW): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pOTW->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pOTW);
            $entityManager->flush();
        }

        return $this->redirectToRoute('p_o_t_w_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
