<?php

declare(strict_types = 1);

namespace Quiz\Eloquent\Transformer;

use Quiz\Eloquent\Model\Quiz as Entity;
use Domain\Model\Quiz as Domain;

class QuizTransformer
{
    /**
     * @throws \Common\Exception\InvalidIdException
     * @throws \Domain\Exception\InvalidQuizType
     */
    public function entityToDomain(Entity $entity): Domain
    {
        return new Domain(
            \Common\Id::create($entity->id),
            $entity->name,
        );
    }

    public function domainToEntity(Domain $domain): Entity
    {
        $entity = new Entity();
        $entity->id = (string)$domain->getId();
        $entity->name = $domain->getName();

        return $entity;
    }
}
