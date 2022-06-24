<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use
Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();
        // $admin = new User();
        // $user1 = new User();
        // $user2 = new User();
        // $admin->setEmail('admin@gmail.com')
        //       ->setRoles(['ROLE_ADMIN'])
        //       ->setPassword($this->passwordHasher->hashPassword(
        //         $admin,
        //         '123'
        //     ));

        // $user1->setEmail('admin@gmail.com')
        //     ->setRoles(['ROLE_ADMIN'])
        //     ->setPassword($this->passwordHasher->hashPassword(
        //         $user1,
        //         '123'
        //     ));

        // $user2->setEmail('admin@gmail.com')
        //     ->setRoles(['ROLE_ADMIN'])
        //     ->setPassword($this->passwordHasher->hashPassword(
        //         $user2,
        //         '123'
        //     ));
        // $manager->persist($admin);
        // $manager->persist($user1);
        // $manager->persist($user2);

        for($cat = 0; $cat < 5; $cat++){
            $category = new Category();
            $category->setName($faker->realText(rand(10,10)));
            $manager->persist($category);

            for($prod = 0; $prod < 20; $prod++){
                $product = new Product();
                $product->setLibelle($faker->realText(rand(10, 20)))
                        ->setPrice($faker->randomNumber(2))
                        ->setDescription($faker->text)
                        ->setCreatedAt(new \DateTimeImmutable())
                        ->setCategory($category);

                $manager->persist($product);
            }
        }

        $manager->flush();
    }
}
