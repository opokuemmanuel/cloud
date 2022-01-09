<?php

namespace App\Http\Controllers;

use App\dd_member;
use App\Members;
use App\programs;
use App\UpdateModel;
use Illuminate\Http\Request;

class DdMemberController extends Controller
{
    public function addMember (Request $request)
    {

        $input = dd_member::where('membership_id',$request->members)->get();

        if (sizeof($input)==1 ){
            return Response()->json(['status'=>403]);

        }else{
            $input = [];
            $input['membership_id'] = trim($request->members);
            $input['club'] = trim($request->club);
            $input['name'] = trim($request->name);
            $input['club_name'] =  trim($request->clubname);

            $addMember = dd_member::create($input);
            if ($addMember){
                return Response()->json(['status'=>201,'addMember'=>$addMember]);
            }
        }
    }

    public function viewMembers(Request $request)
    {
       // $input = Members::where('club',$request->club_name);

        $input = Members::where('club_name',$request->club_name)->get();

        if (sizeof($input)==0){
            return Response()->json(['status' => 403, 'data' => $input]);
        }else{
            return Response()->json(['status' => 201, 'data' => $input]);
        }
    }

    protected function  View_By(Request $request)
    {

        $input = Members::where('club_name',$request->club_name)
                          ->where('membership_id',$request->member)->get();
        if (sizeof($input)==0){
            return Response()->json(['status' => 403, 'dataa' => $input]);
        }else{
            return Response()->json(['status' => 200, 'dataa' => $input]);
        }
    }

    public function updateMember(Request $request)
    {

        $product=  UpdateModel::find($request->member_id);

        $clubs = Members::find($request->clubname);


        if($product && $clubs){
            $product->name = $request->member_name;
            $product->club_name = $request->clubname;
            $product->save();

            return Response()->json(['status' => 200, 'data' => $product]);
        }else{
            return Response()->json(['status' => 403, 'data' => $product]);
        }

    }

    public function delete(Request $request)
    {
         $delete =  Members::where('membership_id',$request->member_id)
                  ->where('club',$request->clubname)->delete();

          if ($delete){
              return Response()->json(['status' => 200, 'data' => $delete]);
          }else{
              return Response()->json(['status' => 403, 'data' => $delete]);
          }

    }
}
