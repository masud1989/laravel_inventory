<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;



class BrandController extends Controller
{
    public function AllBrand(){
        $brand = Brand::latest()->get();

        return view('admin.brand.all_brand', compact('brand'));
    }

    public function AddBrand(){
       
        return view('admin.brand.add_brand');
    }

   public function StoreBrand(Request $request){

    if($request->file('image')) {

        $image = $request->file('image');
        $manager = new ImageManager(new Driver());

        $name_gen = hexdec(uniqid());
        $ext = $image->getClientOriginalExtension();
        $img_name = $name_gen.'.'.$ext;

        $img = $manager->read($image);
        $img->resize(100,90)->save(public_path('upload/brand/'.$img_name));

        $save_url = 'upload/brand/'.$img_name;

        Brand::create([
            'name' => $request->name,
            'image' => $save_url
        ]);

        $notification = array(
            'message' => 'Brand Added Successful', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    }
}
}
