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
    // ham tu dong sinh ra khi goi Note 
    protected static function booted () {
        // Note dang duoc xoa se xoa dong thoi bang lien quan
        static::deleting(function(Note $note) {
            foreach ($note->questions as $question) {
                $question->delete();
            }
        });
    }

    public function projectCriterias() {
        return $this->hasMany(ProjectCriteria::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
