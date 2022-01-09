<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update_Announce extends Model
{
    protected $fillable = ['Title','Message','club'];

    protected $primaryKey = 'Title';

    protected $table = 'announcements';
}
