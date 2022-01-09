<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewAnnouncemnt extends Model
{
    protected $fillable = ['Title','Message','club','clubname'];

    protected $primaryKey = 'club';

    protected $table = 'announcements';
}
