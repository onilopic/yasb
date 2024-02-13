<?php

namespace App\Repository;

use App\Entity\Tag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * This custom Doctrine repository is empty because so far we don't need any custom
 * method to query for application user information. But it's always a good practice
 * to define a custom repository that will be used when the application grows.
 *
 * See https://symfony.com/doc/current/doctrine.html#querying-for-objects-the-repository
 *
 * @template-extends ServiceEntityRepository<Tag>
 */
class TagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tag::class);
    }

    public function findPopular(int $limit)
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = '
select t.name, count(*) as cnt from yasb_post_tag pt 
    left join yasb_tag t on pt.tag_id = t.id 
              group by pt.tag_id, t.name
              order by cnt desc limit :limit';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue('limit', $limit);
        $result = $stmt->executeQuery();
        return $result->fetchAllAssociative();
    }
}
