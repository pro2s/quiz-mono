<?php

declare(strict_types = 1);

namespace Quiz\Eloquent\Transformer;

use Quiz\Eloquent\Model\Quiz as Entity;
use Quiz\Domain\Model\Quiz as Domain;
use Quiz\Common\Id;

class QuizTransformer
{
    /**
     * @throws \Common\Exception\InvalidIdException
     * @throws \Domain\Exception\InvalidQuizType
     */
    public function entityToDomain(Entity $entity): Domain
    {
        return new Domain(
            Id::create($entity->id),
            $entity->name,
            0,
            $entity->startedAt,
            $entity->endedAt,
            0,
            $entity->active,
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
