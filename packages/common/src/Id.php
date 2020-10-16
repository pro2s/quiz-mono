<?php

namespace Quiz\Common;

use Quiz\Common\Exception\InvalidIdException;

final class Id
{
    public const VALID_REGEXP = '/^\{?[A-Fa-f0-9]{8}-[A-Fa-f0-9]{4}-[A-Fa-f0-9]{4}-[A-Fa-f0-9]{4}-[A-Fa-f0-9]{12}\}?$/';
    private $id;

    /**
     * @throws InvalidIdException
     */
    public static function create(string $id): self
    {
        self::isValidUuid($id);

        return new self($id);
    }

    private function __construct(string $id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return $this->id;
    }

    /**
     * @throws InvalidIdException
     */
    private static function isValidUuid(string $id): void
    {
        if (!preg_match(self::VALID_REGEXP, $id)) {
            throw InvalidIdException::forId($id);
        }
    }
}
