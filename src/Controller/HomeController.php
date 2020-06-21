<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function index(UserRepository $user_repo, EntityManagerInterface $em)
    {
        $Users = $user_repo->findAll();

        return $this->render('home/index.html.twig', [
            'users' => $Users
        ]);
    }

}
