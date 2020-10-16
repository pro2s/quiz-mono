<?php

namespace Quiz\Common;

use Quiz\Common\Exception\InvalidSlugException;

final class Slug
{
    public const LENGTH = 15;
    public const VALID_REGEXP = '/^[a-z0-9]+(?:-[a-z0-9]+)*$/im';

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
     * @throws InvalidSlugException
     */
    private static function isValidSlug(string $slug): void
    {
        if (!preg_match(static::VALID_REGEXP, $slug) && strlen($slug) <= self::LENGTH) {
            throw InvalidSlugException::forSlug($slug);
        }
    }
}
