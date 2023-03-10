<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Glass;
use App\Models\Mosaic;
use App\Models\Settings;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function front()
    {
        $gallery = Gallery::all();
        $mosaics = Mosaic::all();
        $glass = Glass::all();
        $sliders = Slider::all();
        $settings = Settings::first();

        $data = ['gallery' => $gallery,'sliders' => $sliders, 'settings' => $settings, 'mosaics' => $mosaics, 'glass' => $glass];


        return view('front.portfolio-modern')->with($data);
    }
}
