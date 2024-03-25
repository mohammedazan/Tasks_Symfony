<?php

namespace App\DataFixtures;

use App\Entity\Tasks;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Tasksfixtrues extends Fixture
{
    public function load(ObjectManager $manager): void
    {   
        for($i=1;$i <= 10 ;$i++){
            $task = new Tasks ;
            $task->setBody("Number Body : ".$i);
            $task->setTitel("Number Titel : ".$i);

            $manager->persist($task);


        }
        $manager->flush();
    }
}
