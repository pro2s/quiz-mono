<?php

declare(strict_types = 1);

namespace Quiz\Eloquent\Transformer;

use Quiz\Eloquent\Model\Quiz as Entity;
use Quiz\Domain\Model\Quiz as Domain;
use Quiz\Common\Id;
use Quiz\Common\Exception\InvalidIdException;

class QuizTransformer
{
    /**
     * @throws \Common\Exception\InvalidIdException
     */
    public function entityToDomain(Entity $entity): Domain
    {
        return new Domain(
            Id::create((string) $entity->id),
            $entity->name,
            0,
            $entity->startedAt,
            $entity->endedAt,
            0,
            (int) $entity->active,
        );
    }

    public function domainToEntity(Domain $domain): Entity
    {
        $entity = new Entity();
        $entity->id = (string) $domain->getId();
        $entity->name = $domain->getName();

        return $entity;
    }
}
