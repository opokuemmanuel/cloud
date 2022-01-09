<?php

namespace App\Http\Controllers;

use App\course_materials;
use Illuminate\Http\Request;

class homepageController extends Controller
{
    public function show_materials(Request $request)
    {
        $materials['mat'] = course_materials::where('club',$request->club)->get();
        return view('materials')->with($materials);
    }

}
