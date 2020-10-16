<?php

declare(strict_types = 1);

namespace Quiz\Domain\Model;

use Quiz\Common\Id;
use Quiz\Common\Slug;

final class Quiz
{
    private $id;

    private $name;

    private $description;

    private $image;

    private $slug;

    private $active;

    private $startAt;

    private $endAt;

    private $type;

    /**
     * Time limit in seconds
     */
    private $timeLimit;

    public function __construct(
        Id $id,
        string $name,
        int $timeLimit,
        ?\DateTime $startAt,
        ?\DateTime $endAt,
        int $type,
        int $active,
        ?Slug $slug = null,
        ?string $description = null,
        ?string $image = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->timeLimit = $timeLimit;
        $this->startAt = $startAt;
        $this->endAt = $endAt;
        $this->type = $type;
        $this->active = $active;
        $this->description = $description;
        $this->slug = $slug;
        $this->image = $image;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getSlug(): ?Slug
    {
        return $this->slug;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTimeLimit(): int
    {
        return $this->timeLimit;
    }

    public function getStartAt(): ?\DateTime
    {
        return $this->startAt;
    }

    public function getEndAt(): ?\DateTime
    {
        return $this->endAt;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getActive(): int
    {
        return $this->active;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }
}
