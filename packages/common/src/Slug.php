<?php

namespace Quiz\Common;

use Quiz\Common\Exception\InvalidSlugException;

final class Slug
{
    public const LENGTH = 15;

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
        if (!preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/im', $slug) && strlen($slug) <= self::LENGTH) {
            throw InvalidSlugException::forSlug($slug);
        }
    }
}
