<?php

namespace App\Http\Controllers;

use App\Models\Glass;
use App\Http\Helper\ImageStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class GlassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $gallery = Glass::paginate(10);
        $data = ['gallery' => $gallery];

        return view('admin.glass.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return view('admin.glass.create');
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

        $imageObj = new ImageStore($request, 'glass');


        $image = $imageObj->imagesStore($request->image);

        Glass::create([
            'image' => $image,
            'name' => $request->name,
            'description' => $request->description,
        ]);


        Session::flash('flash_message', 'Glass image successfully created!');
        return redirect(route('glass.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $gallery = Glass::FindOrFail($id);

        $data = ['gallery' => $gallery];
        return view('admin.glass.edit')->with($data);
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

        $gallery = Glass::FindOrFail($id);
        $input = $request->all();

        if ($request->hasFile('image')) {
            unlink(public_path() . '/assets/img/glass/originals/' . $gallery->image);
            unlink(public_path() . '/assets/img/glass/thumbnails/' . $gallery->image);
            $imageObj = new ImageStore($request, 'glass');

            $image = $imageObj->imagesStore($request->image);

            $input['image'] = $image;
        }
        $gallery->fill($input)->save();

        Session::flash('flash_message', 'Stained Glass image successfully updated!');
        return redirect(route('glass.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $gallery = Glass::FindOrFail($id);
        unlink(public_path() . '/assets/img/glass/originals/' . $gallery->image);
        unlink(public_path() . '/assets/img/glass/thumbnails/' . $gallery->image);
        $gallery->delete();

        Session::flash('flash_message', 'Stained Glass image successfully deleted!');
        return redirect()->back();
    }

}
