<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable=['title','description','place','adress','start_date','end_date'];

    public function Images(){
        return $this->morphMany('Image','Imagetable');
    }
}
