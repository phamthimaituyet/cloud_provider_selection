<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advise extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'project_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
