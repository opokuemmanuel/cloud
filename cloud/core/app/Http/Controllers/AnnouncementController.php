<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Update_Announce;
use App\ViewAnnouncemnt;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnnouncementController extends Controller
{
    public function addAnnouncement (Request $request)
    {

        $announce = Announcement::where('Title',$request->title)
                                  ->where('club',$request->clubname)->get();

        if (sizeof($announce)==1 ){
            return Response()->json(['status'=>403]);

        }else{
            $announce = [];
            $announce['Title'] = trim($request->title);
            $announce['Message'] = trim($request->message);
            $announce['club'] = trim($request->clubname);
            $announce['clubname'] = trim($request->club);

            $addAnnounce = Announcement::create($announce);
            if ($addAnnounce){
                return Response()->json(['status'=>201,'addMember'=>$addAnnounce]);
            }
        }
    }

    public function viewAnnouncement(Request $request)
    {
        // $input = Members::where('club',$request->club_name);

        $input = ViewAnnouncemnt::where('club',$request->club_name)->get();

        if (sizeof($input)==0){
            return Response()->json(['status' => 403, 'data' => $input]);
        }else{
            return Response()->json(['status' => 201, 'data' => $input]);
        }
    }

    protected function  View_By_Title(Request $request)
    {

        $input = Announcement::where('Title',$request->title)
            ->where('club',$request->club_name)->get();
        if (sizeof($input)==0){
            return Response()->json(['status' => 403, 'dataa' => $input]);
        }else{
            return Response()->json(['status' => 200, 'dataa' => $input]);
        }
    }

    public function updateMessage(Request $request)
    {

         $product = ViewAnnouncemnt::find($request->club);

        $Announce_title = Update_Announce::find($request->title);

        if($product && $Announce_title){
            $Announce_title->Title = $request->title;
            $Announce_title->Message = $request->message;
            $Announce_title->clubname = $request->club;
            $Announce_title->save();

            return Response()->json(['status' => 200, 'data' => $Announce_title]);
        }else{
            return Response()->json(['status' => 403, 'data' => $Announce_title]);
        }

    }

    public function delete(Request $request)
    {
        $delete =  ViewAnnouncemnt::where('club',$request->clubname)
            ->where('Title',$request->title)->delete();

        if ($delete){
            return Response()->json(['status' => 200, 'data' => $delete]);
        }else{
            return Response()->json(['status' => 403, 'data' => $delete]);
        }

    }
}
