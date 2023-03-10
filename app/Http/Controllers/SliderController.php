<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Helper\ImageStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::all();
        $data = ["slider" => $slider];
        return view('admin.slider.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'main_image' => 'required|image|file',
            'small_image' => 'required|image|file',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $imageObjM = new ImageStore($request, 'slider_main_img');
        $imageObjS = new ImageStore($request, 'slider_small_img');


        $imageM = $imageObjM->imagesStore($request->main_image);
        $imageS = $imageObjS->imagesStore($request->small_image);
        $description = $request->description;
        $title = $request->title;

        $slider = new Slider();
        $slider->title = $title;
        $slider->main_image = $imageM;
        $slider->small_image = $imageS;
        $slider->description = $description;
        $slider->save();


        Session::flash('flash_message', 'Slider successfully created!');
        return redirect('admin/slider');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::FindOrFail($id);
        $data = ["slider" => $slider];
        return view('admin.slider.edit')->with($data);
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
        $slider = Slider::FindOrFail($id);
        if ($request->hasFile('main_image')) {

            unlink(public_path() . '/assets/img/slider_main_img/originals/' . $slider->main_image);
            unlink(public_path() . '/assets/img/slider_main_img/thumbnails/' . $slider->main_image);


            $imageObjM = new ImageStore($request, 'slider_main_img');

            $imageM = $imageObjM->imagesStore($request->main_image);

            $slider->main_image = $imageM;
            $slider->save();

        }

        if ($request->hasFile('small_image')) {

            unlink(public_path() . '/assets/img/slider_small_img/originals/' . $slider->small_image);
            unlink(public_path() . '/assets/img/slider_small_img/thumbnails/' . $slider->small_image);


            $imageObjS = new ImageStore($request, 'slider_small_img');

            $imageS = $imageObjS->imagesStore($request->small_image);

            $slider->small_image = $imageS;
            $slider->save();

        }


        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();


        Session::flash('flash_message', 'Slider successfully updated!');
        return redirect('admin/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::FindOrFail($id);

        unlink(public_path() . '/assets/img/slider_main_img/originals/' . $slider->main_image);
        unlink(public_path() . '/assets/img/slider_main_img/thumbnails/' . $slider->main_image);
        unlink(public_path() . '/assets/img/slider_small_img/originals/' . $slider->small_image);
        unlink(public_path() . '/assets/img/slider_small_img/thumbnails/' . $slider->small_image);
        $slider->delete();

        Session::flash('flash_message', 'Slider successfully deleted!');
        return redirect()->back();
    }

}
