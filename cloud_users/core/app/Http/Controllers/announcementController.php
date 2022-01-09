<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class announcementController extends Controller
{
    public function announcemnts(Request $request)
    {
        $announce['pro'] = Announcement::where('club',$request->club)->get();

       return view('announcement')->with($announce);
    }
}
