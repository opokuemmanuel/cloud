<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course_materials extends Model
{
    protected $fillable = ['Course_Title','Course_Content','club'];

    protected $table = 'course_materials';
}
