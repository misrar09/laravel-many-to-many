<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'conclusion'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
