<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable=["title","artical_body","author"];

    public function Images(){
        return $this->morphMany('Image','Imagetable');
    }
}
