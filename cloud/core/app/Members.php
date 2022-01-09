<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = ['membership_id','club','name','club_name'];

    protected $primaryKey = 'club';

    protected $table = 'dd_members';
}
