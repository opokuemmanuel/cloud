<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateModel extends Model
{
    protected $fillable = ['membership_id','club','name','club_name'];

    protected $primaryKey = 'membership_id';

    protected $table = 'dd_members';
}
