<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Quiz\Domain\Repository\QuizRepository;
use Quiz\Common\Id;
use App\Http\Resources\QuizResource;

class QuizController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var QuizRepository
     */
    private $quizRepository;

    public function __construct(QuizRepository $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    public function index()
    {
        return QuizResource::collection($this->quizRepository->getAll());
    }

    public function show(Id $id)
    {
        return $this->quizRepository->getById($id);
    }
}
