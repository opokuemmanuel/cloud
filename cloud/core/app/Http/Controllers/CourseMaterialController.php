<?php

namespace App\Http\Controllers;

use App\courseMaterial;
use App\view_courseMaterial;
use Faker\Provider\File;
use Illuminate\Http\Request;

class CourseMaterialController extends Controller
{
    public function upload(Request $request)
    {
        $cl = $request->clubs;

        if ($request->hasFile('pdf')) {

            $files = $request->file('pdf'); // will get all files

            $file_name = $files->getClientOriginalName(); //Get file original name

            $files->storeAs('/public/',$request->clubs."_".$file_name);

            $course  = new courseMaterial();
            $course->Course_Title = $request->title;
            $course->Course_Content = $request->clubs."_".$file_name;
            $course->club = $request->clubs;

            $course->save();

            if ($course){
                return view('homepage')->with('successMsg','material Uploaded successfully');
            }else{
                return view('homepage')->with('successMsg','cannot Upload course content');
            }
        }

    }

    public function add_content()
    {
        return view('homepage');
    }

    public function  view_content(Request $request)
    {
        $content['course'] = courseMaterial::where('club',$request->club)->orderBy('created_at', 'desc')->paginate(4);
        return view('view_course_content')->with($content);
    }


    public function view_contents(Request $request)
    {
        // $input = Members::where('club',$request->club_name);

        $input = courseMaterial::where('club',$request->club)->orderBy('created_at', 'desc')->get();

        if (sizeof($input)==0){
            return Response()->json(['status' => 403, 'data' => $input]);
        }else{
            return Response()->json(['status' => 201, 'data' => $input]);
        }
    }

    public function show_Edit($Course_Title=null)
    {
        $arr = courseMaterial::where('Course_Title',$Course_Title)->first();

        return view('showCourseMaterial')->with(compact('arr'));
    }

    public function update(Request $request)
    {


            $files = $request->file('pdf'); // will get all files

            $file_name = $files->getClientOriginalName(); //Get file original name

            //$files->move(public_path('/files/'.$file_name)); // move files to destination folder
            /// File::move('/files/'.$file_name);
            $files->storeAs('/public/', $file_name);

            $course = courseMaterial::where('id',$request->id)
                                      ->where('club',$request->clubs)->first();

            //$course_club = courseMaterial::find($request->clubs);


               $course->Course_Title = $request->title;
               $course->Course_Content = $file_name;
               $course->club = $request->clubs;

               // dd($course);

               $course->save();

        $content['course'] = courseMaterial::where('club',$request->clubs)->orderBy('created_at', 'desc')->paginate(4);
        return view('view_course_content')->with($content)->with('successMsg','update successful');



    }

    public function delete(Request $request)
    {
        courseMaterial::where('id',$request->id)
                        ->where('club',$request->club)->delete();

        $content['course'] = courseMaterial::where('club',$request->club)->orderBy('created_at', 'desc')->paginate(4);
        return view('view_course_content')->with($content)->with('successMsg','delete successful');

    }


}


