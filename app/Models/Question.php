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

    protected static function booted () {
        // Question dang duoc xoa se xoa dong thoi bang lien quan
        static::deleting(function(Question $question) {
            $question->questionCriterias()->delete();
        });
    }

    public function questionCriterias() {
        return $this->hasMany(QuestionCriteria::class);
    }

    // tu bang question ->  bang criteria khong can qua bang trung gian (n-n)
    public function criterias() {
        return $this->hasManyThrough(Criteria::class, QuestionCriteria::class, 'question_id', 'id', 'id', 'criterias_id');
    }
}
