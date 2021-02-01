<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Brand;
use Image;

class BrandController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function allBrand()
    {
    	$brands = Brand::latest()->paginate(5);
    	return view('admin.brand.index',compact('brands'));
    }


    public function addBrand(Request $request)
    {
    	$request->validate([
        'brand_name' => 'required|min:4',
        'brand_image' => 'required|mimes:jpeg,png,jpg',

        ],[

        	'brand_name.required' =>'Please Input Brand Name',
        	
        ]);


        $brand_image = $request->file('brand_image');

        // $name_gen=hexdec(uniqid());
        // $img_ext=strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $up_location = 'img/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image ->move($up_location,$img_name);

        //image upload using image intervention

        $name_gen=hexdec(uniqid()).'.'. $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(200,200)->save('img/brand/'.$name_gen);
        $last_img ='img/brand/'.$name_gen;

       Brand::insert([
       		'brand_name' => $request->brand_name,
       		'brand_image' => $last_img,
       		'created_at' => Carbon::now()

       ]);

        return redirect()->back()->with('success','Brand Successfuly Insert');

    }


    public function Edit($id)
    {
       $brand = Brand::find($id);

       return view('admin.brand.edit',compact('brand'));
    }


    public function Update(Request $request,$id)
    {
        $request->validate([
        'brand_name' => 'required|min:4',

        ],[

            'brand_name.required' =>'Please Input Brand Name',
            
        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if( $brand_image){
             $name_gen=hexdec(uniqid());
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'img/brand/';
        $last_img = $up_location.$img_name;
        $brand_image ->move($up_location,$img_name);

        unlink($old_image);

       Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()

       ]);

        }
        else{
             Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now()

       ]);

        }

      
        return redirect()->route('all.brand')->with('success','Brand Successfuly Update');

    }


    public function Delete($id)
    {
        $brand = Brand::find($id);
        unlink($brand->brand_image);
        Brand::find($id)->delete();
        return redirect()->back()->with('success','Brand Successfuly Deleted');
    }
}
