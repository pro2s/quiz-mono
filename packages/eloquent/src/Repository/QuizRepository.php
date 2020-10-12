<?php

declare(strict_types = 1);

namespace Quiz\Eloquent\Repository;

use Quiz\Common\Id;
use Quiz\Common\Slug;
use Quiz\Domain\Exception\QuizNotFound;
use Quiz\Domain\Model\Quiz;
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
        $quiz = \Quiz\Eloquent\Model\Quiz::find((string) $quizId);

        if (null === $quiz) {
            throw quizNotFound::forId($quizId);
        }

        return $this->quizTransformer->entityToDomain($quiz);
    }

    /**
     * {@inheritdoc}
     */
    public function getBySlug(Slug $slug): Quiz
    {
        return new Quiz();
    }

    /**
     * {@inheritdoc}
     */
    public function getAll(): array
    {
        return ['test' => 'test'];
    }
}
