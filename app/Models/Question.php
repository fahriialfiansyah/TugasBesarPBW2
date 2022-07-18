<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'questioncategory',
        'question',
        'answera',
        'answerb',
        'answerc',
        'answerd',
        'correct',
    ];

    // public function question()
    // {
    //     return $this->belongsTo('App\Models\Category', 'user_id', 'id');
    // }
}
