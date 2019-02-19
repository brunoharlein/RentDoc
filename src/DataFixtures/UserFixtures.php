<?php

namespace App\DataFixtures;
use Faker;
use Faker\Provider\Base;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
     private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        // $product = new Product();
        // $manager->persist($product);
        // $user = new User();

        // for ($i = 0; $i < 20; $i++) {
          $user = new User();
          $user->setMail ($faker->email);
          $user->setRoles (array('ROLE_BIBLIOTHECAIRE'));
          $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
           'dentiste59'
          ));

          $manager->persist($user);

        $manager->flush();
    }

}
