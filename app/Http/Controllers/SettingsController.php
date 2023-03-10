<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Helper\ImageStore;



class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *`
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();
        $data = ["settings" => $settings];
        return view('admin.settings.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'lat' => 'numeric|nullable',
            'lng' => 'numeric|nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $image = '';
        if ($request->hasFile('image')) {
            $logoObj = new ImageStore($request, 'logo');
            $image = $logoObj->imagesStore($request->image);
        }

        if ($request->hasFile('profile_picture')) {
            $profilePicObj = new ImageStore($request, 'profile_picture');
            $profilePic = $profilePicObj->imagesStore($request->profile_picture);
        }
        $settings = new Settings();
        $settings->title = $request->title;
        $settings->mainurl = env('APP_URL');
        $settings->email = $request->email;
        $settings->address = $request->address;
        $settings->logo = $image;
        $settings->profile_picture = $profilePic;
        $settings->description = $request->description;
        $settings->seo_desc = $request->seo_desc;
        $settings->phone = $request->phone;
        $settings->mobilephone = $request->mobilephone;
        $settings->instagram = $request->instagram;
        $settings->facebook = $request->facebook;
        $settings->lat = $request->lat;
        $settings->lng = $request->lng;
        $settings->save();


        Session::flash('flash_message', 'Settings successfully created!');
        return redirect(route('settings.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = Settings::FindOrFail($id);
        $data = ["settings" => $settings];
        return view('admin.settings.edit')->with($data);
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

        $settings = Settings::FindOrFail($id);
        $input = $request->all();


        if ($request->hasFile('profile_picture')){
            unlink(public_path().'/assets/img/profile_picture/originals/'.$settings->profile_picture);
            unlink(public_path().'/assets/img/profile_picture/thumbnails/'.$settings->profile_picture);

            $profilePicObj = new ImageStore($request, 'profile_picture');
            $profilePic = $profilePicObj->imagesStore($request->profile_picture);
            $input['image'] = $profilePic;

            $settings->update([
                'profile_picture' => $profilePic
            ]);
        }

        if ($request->hasFile('image')){
            unlink(public_path().'/assets/img/logo/originals/'.$settings->logo);
            unlink(public_path().'/assets/img/logo/thumbnails/'.$settings->logo);

            $imageObj = new ImageStore($request, 'logo');
            $image = $imageObj->imagesStore($request->image);
            $input['image'] = $image;

            $settings->update([
                'logo' => $image
            ]);
        }

        $settings->update([
            'title' => $request->get('title'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'description' => $request->get('description'),
            'seo_desc' => $request->get('seo_desc'),
            'phone' => $request->get('phone'),
            'mobilephone' => $request->get('mobilephone'),
            'instagram' => $request->get('instagram'),
            'facebook' => $request->get('facebook'),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
            'facebook' => $request->get('facebook'),
        ]);


        Session::flash('flash_message', 'Settings successfully updated!');
        return redirect(route('settings.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
