<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\multiimg;
use Image;
class MultiimgController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
     {

     	$images = multiimg::latest()->get();
     	return view('admin.multi_img.index',compact('images'));
     }


     public function StoreImg(Request $request)
     {
     	

        $image = $request->file('image');

     
        foreach ($image as $multi_img) {
        	
       
        //image upload using image intervention

        $name_gen=hexdec(uniqid()).'.'. $multi_img->getClientOriginalExtension();
        Image::make($multi_img)->resize(200,200)->save('img/multiple_image/'.$name_gen);
        $last_img ='img/multiple_image/'.$name_gen;

       multiimg::insert([
       		
       		'image' => $last_img,
       		'created_at' => Carbon::now()

       ]);

        }

        return redirect()->back()->with('success','Multiple Image Successfuly Insert');
     }



     public function delete($id)
     {
     	$img = multiimg::find($id);
     	unlink($img->image);
     	multiimg::find($id)->delete();
     	return redirect()->back()->with('success','Image Successfuly deleted');
     }
}
