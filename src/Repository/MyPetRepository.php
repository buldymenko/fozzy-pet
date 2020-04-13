<?php
namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class MyPetRepository extends EntityRepository
{
    public function findPetByNickname($nickname)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $query = $qb->select('mp')
            ->from('App\Entity\MyPet', 'mp')
            ->where('mp.nickname = :nickname')
            ->setParameter('nickname', $nickname)
            ->getQuery();

        return $query->getResult();
    }
}