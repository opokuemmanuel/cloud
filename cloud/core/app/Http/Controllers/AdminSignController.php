<?php

namespace App\Http\Controllers;

use App\AdminSign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AdminSignController extends Controller
{
    public function AdminSign (Request $request)
    {

            $input = AdminSign::where('username',$request->Username)->get();
            $club = AdminSign::where('clubname',$request->Clubname)->get();

            if (sizeof($input)==1 || sizeof($club) == 1){
                return Response()->json(['status'=>403]);

            }else{
                $input = [];
                $input['clubname'] = trim($request->Clubname);
                $input['username'] = trim($request->Username);
                $input['password'] =  Hash::make($request->password);

                $sign = AdminSign::create($input);
                if ($sign){
                    return Response()->json(['status'=>201,'singup'=>$sign]);
                }
            }


    }

    public function Login(Request $request)
    {
        $cred =$request->only(['clubname','password']);

        if (!$token=auth()->attempt($cred)){
            return response()->json([
                'success' =>false,
                'message'=>'invalid credentials',
                'status'=>403,
            ]);
        }
        return response()->json([
            'success'=>true,
            'token'=>$token,
            'status'=>201,
            'user'=>Auth::user()
        ]);

    }

    public function LoginForm(Request $request)
    {
        $cred =$request->only(['clubname','password']);

        if (!$token=auth()->attempt($cred)){
            return back()->with('error', 'incorrect username or password');
        }else{

            return view('homepage');
        }


    }





}
