<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'category_id',
        'type',
        'difficulty_id',
        'question',
        'correct_answer'
    ];

    protected $useTimestamps = false;

    protected $belongsTo = [
        'category' => [
            'model' => 'CategoryModel',
            'foreign_key' => 'category_id'
        ],
        'difficulty' => [
            'model' => 'DifficultyModel',
            'foreign_key' => 'difficulty_id'
        ]
    ];

    public function getQuestionsWithDetails()
    {
        $questions = $this->findAll();

        foreach ($questions as &$question) {
            $categoryModel = new CategoryModel();
            $difficultyModel = new DifficultyModel();
            $incorrect_answersModel = new IncorrectAnswersModel();
            if ($question["type"] =="0"){
                $question['type'] ="multiple";
            }else{ $question['type'] ="boolean";}

            $category = $categoryModel->find($question['category_id']);
            $difficulty = $difficultyModel->find($question['difficulty_id']);
            $incorrect_answers = $incorrect_answersModel->where('question_id',$question['id'])->findAll();

            unset($question['id']);
            unset($question['category_id']);
            unset($question['difficulty_id']);
            $question['category'] = $category['category'];
            $question['difficulty'] = $difficulty['difficulty'];
            $question['incorrect_answers'] = array_column($incorrect_answers, 'incorrect_answer');

        }

        return $questions;
    }


}
