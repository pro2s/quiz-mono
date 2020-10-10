<?php

namespace Quiz\Common;

use Quiz\Common\Exception\InvalidSlugException;

interface SlugGenerator
{
    /**
     * @throws InvalidSlugException
     */
    public function generate(): Slug;
}
