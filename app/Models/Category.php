<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'categoryname', 'question_id'
    ];

    // public function question()
    // {
    //     return $this->hasMany('App\Models\Question', 'user_id', 'id');
    // }
}
