<?php

namespace App\Controllers;

use App\Models\QuizModel;
use CodeIgniter\RESTful\ResourceController;

class QuizController extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        $quizModel = new QuizModel();
        $data = $quizModel->getQuestionsWithDetails();
        $data = [
            'response_code'=> 0,
            'results' => $data
        ];

        return $this->respond($data);
    }
}
