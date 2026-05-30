<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    protected $table = 'posty'; //tabelka jest teraz traktowana jako 'posty' a nie 'posts'
    protected $fillable = [
        'tytul',
        // 'autor',
        // 'email',
        'tresc',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
        // można też dodać klucz obcy, ale skoro jest on w formie '{model}_id' to można to pominąć
        // return $this->belongsTo(User::class,'user_id');
    }
}
