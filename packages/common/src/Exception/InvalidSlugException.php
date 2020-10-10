<?php

declare(strict_types = 1);

namespace Quiz\Common\Exception;

final class InvalidSlugException extends \Exception
{
    public static function forSlug(string $slug): self
    {
        return new self(sprintf('String %s is not valid slug', $slug));
    }
}
