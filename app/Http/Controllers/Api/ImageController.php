<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function index()
    {
        $images = Image::included()->filter()->sort()->get();
        return $images;
    }



    public function store(Request $request)
    {

        $request->validate([
            'image_url' => 'required|image|max:2048',
            'user_id' => 'required|max:255',


        ]);

        $images = Image::create($request->all());

        return $images;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mensaje  $notification
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //$notification = Notification::with(['posts.user'])->findOrFail($id);

        $image = Image::included()->findOrFail($id);
        return $image;

        // return 'holaa';
    }


    public function update(Request $request, Image $image)
    {
        $request->validate([
            'image_url' => 'required|max:255',
            'user_id' => 'required|max:255',

        ]);

        $image->update($request->all());

        return $image;
    }


    public function destroy(Image $image)
    {
        $image->delete();
        return $image;
    }
}
