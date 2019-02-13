<?php

namespace App\Repository;

use App\Entity\Documents;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Documents|null find($id, $lockMode = null, $lockVersion = null)
 * @method Documents|null findOneBy(array $criteria, array $orderBy = null)
 * @method Documents[]    findAll()
 * @method Documents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentsRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Documents::class);
    }


    // public function findCategoryDocuments () {
    //   return $this->createQueryBuilder('d')
    //   ->addSelect('c')
    //   ->leftJoin('d.category', 'c')
    //   ->getQuery()
    //   ->getResult();
    // }


    public function findCategoryDocuments (Category $category = null)
    {
      $request = $this->createQueryBuilder('d')
        ->addSelect('c')
        ->leftJoin('d.category', 'c');
      if($category) {
        $request = $request->andWhere('c.id = :id')->setParameter('id', $category->getId());
      }
        return $request->getQuery()
        ->getResult();
    }

    // /**
    //  * @return Documents[] Returns an array of Documents objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    /*
    public function findOneBySomeField($value): ?Documents
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
