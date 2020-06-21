<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ListUsersController extends AbstractController
{
    /**
     * @Route("/list_users", name="list_users")
     */
    public function index(EntityManagerInterface $em, UserRepository $repo)
    {
        $users = $repo->findAll();
        $columns = $em->getClassMetadata('App\Entity\User')->getColumnNames();
        return $this->render('list_users/index.html.twig', [
            'users' => $users,
            'columns' => $columns,
        ]);
    }
    
    /**
     * @Route("/remove_user/{id}", name="remove_user")
     */
    public function removeUser(EntityManagerInterface $em, UserRepository $repo,User $user)
    {
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('list_users');

    }
    
    /**
     * @Route("/edit_user/{id}", name="edit_user")
     */
    public function editUser(EntityManagerInterface $em, UserRepository $repo, Request $request, UserPasswordEncoderInterface $encoder, User $user)
    {
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {

            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('list_users');
        }
        $columns = $em->remove($user);
        return $this->render('list_users/edit.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
