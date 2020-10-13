<?php

declare(strict_types = 1);

namespace Quiz\Eloquent\Generator;

use Quiz\Common\Id;
use Ramsey\Uuid\Uuid;

class IdGenerator implements \Quiz\Common\IdGenerator
{
    /**
     * @throws \Common\Exception\InvalidIdException
     */
    public function generate(): Id
    {
        return Id::create((string) Uuid::uuid4());
    }
}
