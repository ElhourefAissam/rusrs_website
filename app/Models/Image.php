<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable=['uid_origin','name','path'];

    public function Article(){
        return $this->belongsTo(Article::class);
    }

    public function Event(){
        return $this->belongsTo(Event::class);
    }

    public function Imagetable(){
        return $this->morphTo();
    }
}
