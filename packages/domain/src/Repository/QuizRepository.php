<?php

declare(strict_types = 1);

namespace Quiz\Domain\Repository;

use Quiz\Common\Id;
use Quiz\Common\Slug;
use Quiz\Domain\Model\Quiz;
use Quiz\Domain\Exception\DomainException;

interface QuizRepository
{
    /**
     * @throws DomainException
     */
    public function getById(Id $id): Quiz;

    /**
     * @throws DomainException
     */
    public function getBySlug(Slug $slug): Quiz;

    /**
     * @throws DomainException
     * @return Quiz[]
     */
    public function getAll(): array;
}
