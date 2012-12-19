<?php

namespace Demo\Model\Entity;

use Doctrine\ORM\EntityRepository;

class GuestbookRepository extends EntityRepository
{
    /**
     * Returns an array with guestbook data
     *
     * @return array
     */
    public function findAllOrderByDate()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT c.title, c.post, c.date FROM Demo\Model\Entity\Guestbook as c ORDER BY c.date DESC')
            ->getResult();
    }
}