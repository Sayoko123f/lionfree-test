<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    private $imgdir = './img/';
    //
    public function view()
    {
        return view('imgcontroller.index');
    }

    public function upload(Request $q)
    {
        $q->validate(['photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000']);
        if (!($q->file('photo')->isValid())) {
            return response('Invalid file.', 400);
        }

        Image::make($q->file('photo'))->save($this->imgdir . uniqid() . '.' . $q->file('photo')->extension());
        return response()->redirectToRoute('image');
    }
}
