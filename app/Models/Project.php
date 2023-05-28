<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    protected static function booted()
    {
        static::deleting(function(Project $project) {
            foreach ($project->notes as $note) {
                $note->delete();
            }
        });
    }

    public function projectCriterias() {
        return $this->hasMany(ProjectCriteria::class);
    }

    public function user() {
        return $this->belongsTo(Project::class);
    }

    public function notes() {
        return $this->hasMany(Note::class);
    }
}
