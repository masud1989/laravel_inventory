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

    $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if($request->file('image')) {

        $image = $request->file('image');
        $manager = new ImageManager(new Driver());

        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

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
    }else{
        Brand::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Brand Added Successful without Image',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    }
}



    public function EditBrand($id){
        $brand = Brand::find($id);

        return view('admin.brand.edit_brand', compact('brand'));
    }

   

    public function UpdateBrand(Request $request){

    $brand_id = $request->id;
    $brand = Brand::findOrFail($brand_id);

    if ($request->file('image')) {

        $image = $request->file('image');
        $manager = new ImageManager(new Driver());

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        $img = $manager->read($image);
        $img->resize(100,90)->save(public_path('upload/brand/'.$name_gen));

        $save_url = 'upload/brand/'.$name_gen;

        if ($brand->image && file_exists(public_path($brand->image))) {
            unlink(public_path($brand->image));
        }

        $brand->update([
            'name' => $request->name,
            'image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand Updated with Image Successful',
            'alert-type' => 'success',
        );

        return redirect()->route('all.brand')->with($notification);

    } else {

        $brand->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Brand Updated without Image Successful',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    }
}

    public function DeleteBrand($id){
        $item = Brand::find($id);
        $img = $item->image;
       
        if(file_exists($img)){
             unlink($img);
        }

        Brand::find($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successful',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
}
