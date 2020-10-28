<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable=["full_name","facebook","position"];
=======
    protected $fillable=[''];

    public function Images(){
        return $this->morphMany(Photo::class,'Imageable');
    }
>>>>>>> 5bfc51166ad8f2db1b95cf452ee96fc193464982
}
