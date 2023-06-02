<?php

namespace App\Models;

use CodeIgniter\Model;

class IncorrectAnswersModel extends Model
{
    protected $table = 'incorrect_answers';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = ['incorrect_answer','question_id'];


    protected $useTimestamps = false;

    public function getdifficulties()
    {
        return $this->findAll();

    }
}
