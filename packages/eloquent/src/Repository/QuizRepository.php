<?php

declare(strict_types = 1);

namespace Quiz\Eloquent\Repository;

use Common\Id;
use Domain\Exception\QuizNotFound;
use Domain\Model\Quiz;
use Quiz\Eloquent\Transformer\QuizTransformer;

class QuizRepository implements \Domain\Repository\QuizRepository
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
}
