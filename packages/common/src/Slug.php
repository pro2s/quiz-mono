<?php

namespace Quiz\Common;

use Quiz\Common\Exception\InvalidSlugException;

final class Slug
{
    public const LENGTH = 5;

    private $slug;

    /**
     * @throws InvalidSlugException
     */
    public static function create(string $slug): self
    {
        self::isValidSlug($slug);

        return new self($slug);
    }

    private function __construct(string $slug)
    {
        $this->slug = $slug;
    }

    public function __toString()
    {
        return $this->slug;
    }

    /**
     * @throws InvalidIdException
     */
    private static function isValidSlug(string $slug)
    {
        if (!preg_match('/^?[A-za-z0-9]{' . self::LENGTH . '}?$/', $slug)) {
            throw InvalidSlugException::forSlug($slug);
        }
    }
}
