<?php

namespace App\DataFixtures;
use Faker;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create("fr_FR");
        for($i = 0; $i<10; $i++){
            $category = new Category();
            $category->setName($faker->company);
            $manager->persist($category);
            $this->addReference("category$i", $category);
        }
        $manager->flush();
    }
}
