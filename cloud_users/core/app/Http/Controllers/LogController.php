<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\course_materials;
use App\dd_member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function show_login()
    {
       return view('Loginss');
    }

    public function Login(Request $request)
    {
        $cred =$request->only(['membership_id','password']);

        if (!$token=auth()->attempt($cred)){
          //  dd($cred);
            return view('Loginss')->with('successMsg','incorrect membership id or password');

//            return response()->json([
//                'status'=>403,
//                'data'=>$cred
//            ]);
        }else{

         $Auth = Auth::user()->clubname ;


          $course_count = course_materials::where('club','=',$Auth);
          $announce_count = Announcement::where('club','=',$Auth);
          $member_count = dd_member::where('club','=',$Auth);



            return view('dashboard',compact('course_count','announce_count'),compact('member_count'));
        }

    }
}
