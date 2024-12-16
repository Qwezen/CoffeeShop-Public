<?php

namespace App\Repository;

use App\Entity\Produits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produits>
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produits::class);
    }


    public function findAllProduits(): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // src/Repository/ProduitsRepository.php
    public function findAllProduits2(): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.bestseller = :bestseller')  // Ajouter la condition
            ->setParameter('bestseller', 1)       // Définir la valeur du paramètre
            ->orderBy('c.id', 'DESC')             // Tri par ID décroissant
            ->getQuery()
            ->getResult();
    }

    // Retourne une requête paginable pour les produits
    public function findAllProduitsQuery()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'ASC');
            //->getQuery(); 
    }

    
    //public function findAll(): array
    //{
        //return $this->createQueryBuilder('p')
            //->orderBy('p.id', 'ASC')
            //->getQuery();
   // }



    //    /**
    //     * @return Produits[] Returns an array of Produits objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Produits
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
