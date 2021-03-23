<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\ArticleSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }


/**
 * @return Query
 */
public function findAllVisibleQuery(PropertySearch $search): Query
{
    $query = $this->findAllQuery();



    return $query->getQuery();

}
    /**
     * @return Query
     */

    public function  findAllQueries(ArticleSearch $search): Query
    {
        $query = $this->findAllQuery();
        // affiche les produits dont le prix est inférieur au nombre saisi
        if($search->getMaxPrice()) {
            $query=$query
                ->andwhere('a.artPrixHt < :maxprice')
                ->setParameter('maxprice',$search->getMaxPrice());
        }
        // affiche les produits dont le prix est supérieur au nombre saisi
        if($search->getMinPrice()) {
            $query=$query
                ->andwhere('a.artPrixHt >= :minprice')
                ->setParameter('minprice',$search->getMinPrice());
        }

        return $query->getQuery();

    }

    private function  findAllQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('a');
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
