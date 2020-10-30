<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable=["title","article_body","author"];

    public function photos(){
        return $this->morphMany(Photo::class,'imageable');
    }
}
