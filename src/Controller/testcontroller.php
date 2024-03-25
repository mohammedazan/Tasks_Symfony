<?php
// src/Controller/LuckyController.php

namespace App\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function affiche()
    {   $tasks = [
        [
            "id" => 1 ,
            "titel" => "math home work ",
            "discription" => "math equations to coplete"
        ],
        [
            "id" => 2 ,
            "titel" => "sciece  home work ",
            "discription" => "sciece task to coplete"
        ],
        [
            "id" => 3 ,
            "titel" => "arabice  home work ",
            "discription" => "arabice  task  to coplete"
        ],
    ] ; 
        return   $this->render('index.html.twig',[ "TaskArray" => $tasks]) ;

    }
}
