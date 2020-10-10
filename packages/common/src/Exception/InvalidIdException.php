<?php

declare(strict_types = 1);

namespace Quiz\Common\Exception;

final class InvalidIdException extends \Exception
{
    public static function forId(string $id): self
    {
        return new self(sprintf('String %s is not valid uuid', $id));
    }
}
