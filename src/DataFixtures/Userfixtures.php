<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class Userfixtures extends Fixture
{   
    private $passwordhasher ;
    public function __construct(UserPasswordHasherInterface $passwordhasher)
    {
        $this->passwordhasher = $passwordhasher ;
    }


    public function load(ObjectManager $manager): void
    {   
            $user = new User ;
           // $plaintextPassword = "111";

            // hash the password (based on the security.yaml config for the $user class)
//            $hashedPassword = $this->passwordhasher->hashPassword(
//                $user,
//                $plaintextPassword
//            );
            $user->setUsername("user number : ");
            $user->setEmail("useremail@gmail.com");
            $user->setPassword("hashedPassword");
            $manager->persist($user);
        $manager->flush();
    }
}
