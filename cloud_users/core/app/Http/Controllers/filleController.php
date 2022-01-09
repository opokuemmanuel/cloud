<?php

namespace App\Http\Controllers;

use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class fillController extends Controller
{
    public function download($Course_Content)
    {

        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/bb-Emma.pdf";

        $headers = array(
            'Content-Type: application/pdf,docx,mp3',
        );

        return response()->download($file, $Course_Content, $headers);




    }
}
