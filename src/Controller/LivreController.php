<?php

namespace App\Controller;

use App\Entity\Livre;
use App\Entity\Type;
use App\Form\LivreType;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/livre')]
class LivreController extends AbstractController
{
    #[Route('/', name: 'app_livre_index', methods: ['GET'])]
    public function index(TypeRepository $typeRepository): Response
    {
        return $this->render('type/index.html.twig', [
            'types' => $typeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_livre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $livre = new Livre();
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livre);
            $entityManager->flush();

            return $this->redirectToRoute('app_livre_show', ['libelle' => $livre->getTypes()->getLibelle(), 'nom' => $livre->getNom()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('livre/new.html.twig', [
            'livre' => $livre,
            'form' => $form,
        ]);
    }

    #[Route('/{libelle}/{nom}/edit', name: 'app_livre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Livre $livre, Type $type, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LivreType::class, $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_livre_show', ['libelle' => $livre->getTypes()->getLibelle(), 'nom' => $livre->getNom()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('livre/edit.html.twig', [
            'livre' => $livre,
            'type' => $type,
            'edit' => $form,
        ]);
    }

    #[Route('/{libelle}', name: 'app_type_show', methods: ['GET'])]
    public function typeShow(Type $type): Response
    {
        return $this->render('type/show.html.twig', [
            'type' => $type,
        ]);
    }

    #[Route('/{libelle}/{nom}', name: 'app_livre_show', methods: ['GET'])]
    public function show(Livre $livre, Type $type): Response
    {
        return $this->render('livre/show.html.twig', [
            'livre' => $livre,
            'type' => $type,
        ]);
    }
}
