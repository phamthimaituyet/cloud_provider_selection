<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'user_id',
        'note_id'
    ];

    public function questionCriterias() {
        return $this->hasMany(QuestionCriteria::class);
    }

    public function criterias() {
        return $this->hasManyThrough(Criteria::class, QuestionCriteria::class, 'question_id', 'id', 'id', 'criterias_id');
    }
}
