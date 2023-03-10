<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Http\Helper\ImageStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $gallery = Gallery::paginate(10);
        $data = ['gallery' => $gallery];

        return view('admin.gallery.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $user_id = $user->id;

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image', 'file', 'max:20000']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $imageObj = new ImageStore($request, 'gallery');


        $image = $imageObj->imagesStore($request->image);

        Gallery::create([
            'image' => $image,
            'name' => $request->name,
            'description' => $request->description,
        ]);


        Session::flash('flash_message', 'Gallery image successfully created!');
        return redirect(route('gallery.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $gallery = Gallery::FindOrFail($id);

        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $gallery = Gallery::FindOrFail($id);
        $input = $request->all();


        if ($request->hasFile('image')) {
            unlink(public_path() . '/assets/img/gallery/originals/' . $gallery->image);
            unlink(public_path() . '/assets/img/gallery/thumbnails/' . $gallery->image);

            $imageObj = new ImageStore($request, 'gallery');

            $image = $imageObj->imagesStore($request->image);

            $input['image'] = $image;
        }
        $gallery->fill($input)->save();

        Session::flash('flash_message', 'Gallery image successfully updated!');
        return redirect(route('gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $gallery = Gallery::FindOrFail($id);
        unlink(public_path() . '/assets/img/gallery/originals/' . $gallery->image);
        unlink(public_path() . '/assets/img/gallery/thumbnails/' . $gallery->image);
        $gallery->delete();

        Session::flash('flash_message', 'Gallery image successfully deleted!');
        return redirect()->back();
    }

}
