<?php

namespace App\Http\Controllers;

use App\Models\Mosaic;
use App\Http\Helper\ImageStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class MosaicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $gallery = Mosaic::paginate(10);
        $data = ['gallery' => $gallery];

        return view('admin.mosaic.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('admin.mosaic.create');
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

        $imageObj = new ImageStore($request, 'mosaic');


        $image = $imageObj->imagesStore($request->image);

        Mosaic::create([
            'image' => $image,
            'name' => $request->name,
            'description' => $request->description,
        ]);


        Session::flash('flash_message', 'Mosaic image successfully created!');
        return redirect(route('mosaic.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $gallery = Mosaic::FindOrFail($id);

        $data = ['gallery' => $gallery];
        return view('admin.mosaic.edit')->with($data);
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

        $gallery = Mosaic::FindOrFail($id);
        $input = $request->all();


        if ($request->hasFile('image')) {
            unlink(public_path() . '/assets/img/mosaic/originals/' . $gallery->image);
            unlink(public_path() . '/assets/img/mosaic/thumbnails/' . $gallery->image);
            $imageObj = new ImageStore($request, 'mosaic');

            $image = $imageObj->imagesStore($request->image);

            $input['image'] = $image;
        }
        $gallery->fill($input)->save();

        Session::flash('flash_message', 'Mosaic image successfully updated!');
        return redirect(route('mosaic.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $gallery = Mosaic::FindOrFail($id);
        unlink(public_path() . '/assets/img/mosaic/originals/' . $gallery->image);
        unlink(public_path() . '/assets/img/mosaic/thumbnails/' . $gallery->image);
        $gallery->delete();

        Session::flash('flash_message', 'Mosaic image successfully deleted!');
        return redirect()->back();
    }

}
