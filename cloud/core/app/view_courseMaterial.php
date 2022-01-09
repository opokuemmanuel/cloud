<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class view_courseMaterial extends Model
{
    protected $fillable = ['Course_Title','Course_Content','club'];

    protected $primaryKey = 'club';

    protected $table = 'course_materials';
}
