<?php

namespace App\DataFixtures;

use Faker;
use Faker\Provider\Base;
use App\Entity\Documents;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      // $faker = Faker\Factory::create('fr_FR');
      //
      //     $documents = new Documents();
      //     $documents->setTitle ($faker->name);
      //     $documents->setAuthor ($faker->name);
      //     $documents->setReleaseDate (new \DateTime($faker->date($format = 'Y-m-d', $max = 'now')));
      //     $documents->setStatu ($faker->boolean);
      //     $documents->setResume ($faker->text);
      //
      //     $manager->persist($documents);
      //
      //   $manager->flush();
    }
}
