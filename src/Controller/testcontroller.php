<?php
// src/Controller/LuckyController.php

namespace App\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Tasks;
use App\Form\TaskType;
use App\Repository\TasksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
//use Doctrine\Persistence\ManagerRegistry;

class LuckyController extends AbstractController 
{       

        private $tasksRepository ;

        public function __construct(TasksRepository $tasksRepository)
        {   
            $this->tasksRepository = $tasksRepository ;
        }

        #[Route('/', name: 'tasks_list')]
        public function affiche()
        {   $tasks = $this->tasksRepository->findAll() ;
            return   $this->render('index.html.twig',[ "TaskArray" => $tasks]) ;

        }        

        
        
        #[Route('/tasks/{id}', name: 'tasks_show')]
        public function ShowTasks($id)
        {   $tasks = $this->tasksRepository->find($id) ;
            return   $this->render('showtasks.html.twig',[ "TaskArray" => $tasks]) ;

        }   

        #[Route('/newtasks', name: 'tasks_add')]
        public function CreateTasks(Request $request , EntityManagerInterface $em): Response{
            $tasks = new Tasks();

            $form = $this->createForm(TaskType::class, $tasks);
            $form = $form->handleRequest($request);
            
            if($form->isSubmitted() && $form->isValid()){

                $tasks = $form->getData();
                $em -> persist($tasks);
                $em ->flush();
                return $this->redirectToRoute('tasks_list');
            }
    
            return $this->render('add.html.twig', [
                'form' => $form->createView(),
            ]);
        }


        #[Route('/update_tasks/{id}', name: 'tasks_update')]
        public function UpdateTasks(int $id, Request $request, EntityManagerInterface $em): Response
        {
            // Retrieve the task by its ID // commant 
            $task = $em->getRepository(Tasks::class)->find($id);
            
            if (!$task) {
                throw $this->createNotFoundException('Task not found');
            }
    
            $form = $this->createForm(TaskType::class, $task);
            $form->handleRequest($request);
            
            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();
                return $this->redirectToRoute('tasks_list');
            }
    
            return $this->render('update.html.twig', [
                'form' => $form->createView(),
            ]);
        }
        
    
}
