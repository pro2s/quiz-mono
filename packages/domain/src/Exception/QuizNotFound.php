<?php

declare(strict_types = 1);

namespace Quiz\Domain\Exception;

use Quiz\Common\Id;
use Quiz\Common\Slug;

class QuizNotFound extends DomainException
{
    public static function forId(Id $id): self
    {
        return new self(
            sprintf("Quiz with id %s not found", $id)
        );
    }

    public static function forSlug(Slug $slug): self
    {
        return new self(
            sprintf("Quiz with slug %s not found", $slug)
        );
    }
}
