<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table="Articles";

=======
>>>>>>> 05184af65a2a3b81d3261d1d3f027f93b5259a05
    protected $fillable=["title","artical_body","author"];
}
