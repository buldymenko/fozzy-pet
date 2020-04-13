<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class KindPetRepository extends EntityRepository
{
    public function findPetByType($type)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $query = $qb->select('kp')
            ->from('App\Entity\KindPet', 'kp')
            ->where('kp.kindOfPet = :kindOfPet')
            ->setParameter('kindOfPet', $type)
            ->getQuery();

        return $query->getOneOrNullResult();
    }
}