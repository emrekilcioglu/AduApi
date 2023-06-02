<?php

namespace App\Models;

use CodeIgniter\Model;

class DifficultyModel extends Model
{
    protected $table = 'difficulties';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = ['difficulty'];

    protected $useTimestamps = false;

    public function getdifficulties()
    {
        return $this->findAll();
    }
}
