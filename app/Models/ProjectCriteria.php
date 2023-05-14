<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCriteria extends Model
{
    use HasFactory;

    protected $table = "project_criterias";

    protected $fillable = [
        'note_id',
        'criteria_id',
        'project_id'
    ];

    public function criteria() {
        return $this->belongsTo(Criteria::class);
    }

    public function note() {
        return $this->belongsTo(Note::class);
    }
}
