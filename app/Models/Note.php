<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = "notes";

    protected $fillable = [
        'note',
        'user_id',
        'project_id',
    ];

    public function projectCriterias() {
        return $this->hasMany(ProjectCriteria::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
