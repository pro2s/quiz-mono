<?php

namespace Quiz\Common;

use Quiz\Common\Exception\InvalidIdException;

interface IdGenerator
{
    /**
     * @throws InvalidIdException
     */
    public function generate(): Id;
}
