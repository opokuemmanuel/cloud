<?php

namespace App\Http\Controllers;

use App\dd_member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registrationController extends Controller
{
    public function show_registration()
    {
       return view('register');
    }

    public function register_student(Request $request)
    {

        $check_membership_id = dd_member::where('membership_id',$request->membership_id)
                                          ->where('club',$request->clubname)->get();

        $check_membership_id_exist = User::where('membership_id',$request->membership_id)->get();

        if (sizeof($check_membership_id_exist) ==1){

            return Response()->json(['status'=>201,'data'=>$check_membership_id_exist]);

        }

        elseif(sizeof($check_membership_id_exist) != 1){

            if (sizeof($check_membership_id) != 1) {

                return Response()->json(['status'=>500,'data'=>$check_membership_id]);

            }else{

                    $input = [];
                    $input['membership_id'] = $request->membership_id;
                    $input['clubname'] = $request->clubname;
                    $input['password'] = Hash::make($request->password);

                    User::create($input);

                return Response()->json(['status'=>200,'data'=>$input]);

            }
        }

    }
}
