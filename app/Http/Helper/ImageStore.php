<?php

namespace App\Http\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ImageStore
{

    public $request;
    public $path;
    public $paths;

    public function __construct(Request $request, $path)
    {
        $this->request = $request;
        $this->path = $path;
    }


    public function imagesStore($image)
    {

        $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
        $paths = $this->makePaths();


        File::makeDirectory($paths['original'], $mode = 0755, true, true);
        File::makeDirectory($paths['thumbnail'], $mode = 0755, true, true);


        $image->move($paths['original'], $imageName);

        $findimage = $paths['original'] . $imageName;
        $imagethumb = Image::make($findimage)->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $imagethumb->save($paths['thumbnail'] . $imageName);

        return $imageName;



    }/*
    public function imageStore($fileName = 'image')
    {
        if ($this->request->hasFile($fileName)) {
            $image = $this->request->file($fileName);
            $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
            $paths = $this->makePaths();


            File::makeDirectory($paths['original'], $mode = 0755, true, true);
            File::makeDirectory($paths['thumbnail'], $mode = 0755, true, true);

            $image->move($paths['original'], $imageName);

            $findimage = $paths['original'] . $imageName;
            $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $imagethumb->save($paths['thumbnail'] . $imageName);

            return $imageName;
        }

        return false;
    }*/

    public function makePaths()
    {
        $original = public_path() . '/assets/img/' . $this->path . '/originals/';;
        $thumbnail = public_path() . '/assets/img/' . $this->path . '/thumbnails/';
        $paths = ['original' => $original, 'thumbnail' => $thumbnail];
        return $paths;
    }
}
