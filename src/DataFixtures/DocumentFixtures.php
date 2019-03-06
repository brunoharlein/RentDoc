<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Documents;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class DocumentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create("fr_FR");

        for($i = 0; $i<30; $i++){
            $document = new Documents();
            $document->setTitle($faker->company);
            $document->setAuthor($faker->company);
            $document->setReleaseDate($faker->dateTime());
            $document->setResume($faker->company);
            $number = rand(0, 9);
            $document->setCategory($this->getReference("category$number"));
            $document->setStatu(false);
            $manager->persist($document);
        }

        $manager->flush();
    }
}
