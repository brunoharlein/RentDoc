<?php

namespace App\DataFixtures;

use App\Entity\Documents;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        // for ($i = 0; $i < 20; $i++) {
        //   $documents = new Documents();
        //   $documents->setTitle ($faker->name);
        //   $documents->setAuthor ($faker->name);
        //   $documents->setReleaseDate ($faker->date($format = 'Y-m-d', $max = 'now'));
        //   $documents->setStatu ($faker->boolean);
        //   $documents->setResume ($faker->name);
        //   $manager->persist($documents);
        //
        // }
        //
        // $manager->flush();
    }
}
