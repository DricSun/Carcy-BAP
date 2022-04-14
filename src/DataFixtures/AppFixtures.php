<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $user = new User();
            $user->setEmail('test' . $i . '@gmail.com');
            $password = $this->hasher->hashPassword($user, 'password');
            $user->setPassword($password);
            $user->setRoles([
                'ROLE_ADMIN',
                'ROLE_USER'
            ]);

            $manager->persist($user);

        }
        $manager->flush();

    }

}
