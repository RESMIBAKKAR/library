<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'pdf', 'users_id', 'writers_id'];

    public function categories(){

        return $this->belongsToMany(Category::class, 'categories_books');

    }

    public function user(){

        return $this->belongsTo(User::class);

    }
    public function writer(){

        return $this->belongsTo(Writer::class);

    }
}
