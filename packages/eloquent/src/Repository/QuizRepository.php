<?php

declare(strict_types = 1);

namespace Quiz\Eloquent\Repository;

use Quiz\Common\Id;
use Quiz\Common\Slug;
use Quiz\Domain\Exception\QuizNotFound;
use Quiz\Domain\Model\Quiz;
use Quiz\Eloquent\Model\Quiz as Entity;
use Quiz\Domain\Repository\QuizRepository as QuizRepositoryInterface;
use Quiz\Eloquent\Transformer\QuizTransformer;

class QuizRepository implements QuizRepositoryInterface
{
    private $quizTransformer;

    public function __construct(QuizTransformer $quizTransformer)
    {
        $this->quizTransformer = $quizTransformer;
    }

    /**
     * {@inheritdoc}
     */
    public function getById(Id $quizId): Quiz
    {
        $quiz = Entity::find((string) $quizId);

        if (null === $quiz) {
            throw QuizNotFound::forId($quizId);
        }

        return $this->quizTransformer->entityToDomain($quiz);
    }

    /**
     * {@inheritdoc}
     */
    public function getBySlug(Slug $slug): Quiz
    {
        $quiz = Entity::find('slug', (string) $slug);

        if (null === $quiz) {
            throw QuizNotFound::forSlug($slug);
        }

        return $this->quizTransformer->entityToDomain($quiz);
    }

    /**
     * {@inheritdoc}
     */
    public function getAll(): array
    {
        return Entity::where('active', 1)
            ->get()
            ->map(fn (Entity $quiz) => $this->quizTransformer->entityToDomain($quiz))
            ->all();
    }
}
