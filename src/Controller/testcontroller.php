<?php
// src/Controller/LuckyController.php

namespace App\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\TasksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController 
{
    #[Route('/my-test-route', name: 'test_route')]
    public function index(): Response
    {
        return new Response('<html><body>hello world</body></html>');
    }

    #[Route('/indexbage', name: 'test_route2')]
    public function affiche( TasksRepository $tasksRepository)
    {   $tasks = $tasksRepository->findAll() ;
        return   $this->render('index.html.twig',[ "TaskArray" => $tasks]) ;

    }
}
