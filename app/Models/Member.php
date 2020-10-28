<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable=["full_name","facebook","position"];

    public function Images(){
        return $this->morphMany(Photo::class,'Imageable');
    }
}
