<?php

namespace App\Http\Controllers;

use App\Description;
use App\Image;
use Illuminate\Http\Request;

class FavoriteImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $images = Image::with(['description'])->select('*')->get();

        return view('pages.favorite_image.image',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $image = new Image();
       $image->image_url = $_POST['url'];
       $image->save();
        if($_POST['description'] != "") {
            $description = new Description();
            $description->description = $_POST['description'];
            $insertedId = $image->id;
            $description->image_id = $insertedId;
            $description->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_image(Request $request)
    {
        if(Image::with(['description'])->where('id', $request->input('image_id'))->delete()){
            return "SUCCESS";
        } else{
            return "FAIL";
        }
    }
    public function delete_des(Request $request)
    {
        if(Description::find($request->input('des_id'))->delete()){
            return "SUCCESS";
        } else{
            return "FAIL";
        }
    }
}
