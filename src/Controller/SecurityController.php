<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route('/publicuser/{id}', name: 'public_user')]
    public function show(User $user): Response
    {
        return $this->render('security/public_profil.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/user/{id}/delete', name: 'delete_user')]
    public function delete(ManagerRegistry $doctrine, User $user = null): Response
    {

        $entityManager = $doctrine->getManager();
        // prepare
        $entityManager->remove($user);
        // insert into (execute)
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }
    #[Route('/user/{id}/deleteform', name: 'delete_user_form')]
    public function deleteform(User $user = null): Response
    {
        return $this->render('security/delete_user_form.html.twig');
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
