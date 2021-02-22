<?php
namespace App\Repository;
use App\Entity\Job;
use Doctrine\ORM\EntityRepository;
use App\Entity\Category;
use Doctrine\ORM\AbstractQuery;
class JobRepository extends EntityRepository{
    /**
     * @param int $id
     *
     * @return Job|null
     */
    public function findActiveJob(int $id) : ?Job{
        return $this->createQueryBuilder('j')
            ->where('j.id = :id')
            ->andWhere('j.expiresAt > :date')
            ->setParameter('id', $id)
            ->setParameter('date', new \DateTime())
            ->getQuery()
            ->getOneOrNullResult();
    }
    /**
     * @param Category $category
     *
     * @return AbstractQuery
     */
    public function getPaginatedActiveJobsByCategoryQuery(Category $category) : AbstractQuery
    {
        return $this->createQueryBuilder('j')
            ->where('j.category = :category')
            ->andWhere('j.expiresAt > :date')
            ->setParameter('category', $category)
            ->setParameter('date', new \DateTime())
            ->getQuery();
    }
}
?>