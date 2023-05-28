<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'criterias_id',
        'question_id',
    ];
}
