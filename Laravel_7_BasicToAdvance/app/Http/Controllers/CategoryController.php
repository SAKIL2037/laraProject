<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function allCat()
    {
    	$categories = Category::latest()->paginate(5);

    	$trashCat = Category::onlyTrashed()->latest()->paginate(3);

    	return view('admin.category.index',compact('categories','trashCat'));
    }


    public function addCat(Request $request)
    {
    	$request->validate([
        'category_name' => 'required|max:255',
        ],[

        	'category_name.required' =>'Please Input Category Name',
        	'category_name.max' =>'Category less then 255 Char',
        ]);



        Category::insert([

        	'category_name'=> $request->category_name,
        	'user_id'=> Auth::user()->id,
        	'created_at' => Carbon::now()
        ]);

        // $category = new Category;

        // $category->category_name=$request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        return redirect()->back()->with('success','Category Successfuly Insert');

    	
    }



    public function Edit($id)
    {
    	$categories = Category::find($id);

    	return view('admin.category.edit',compact('categories'));
    }


    public function Update(Request $request,$id)
    {


    	$request->validate([
        'category_name' => 'required|max:255',
        ],[

        	'category_name.required' =>'Please Input Category Name',
        	'category_name.max' =>'Category less then 255 Char',
        ]);

    	$update = Category::find($id)->update([

    		'category_name' => $request->category_name,
    		'user_id' => Auth::user()->id

    	]);

    	return redirect()->route('all.category')->with('success','Update Successfully');


    }


    //softDelete 

    public function softDelete($id){
    	$delete = Category::find($id)->delete();

    	return redirect()->back()->with('success','Category Successfuly Deleted');
    }

    //restore
    public function reStore($id)
    {

    	$delete = Category::withTrashed()->find($id)->restore();
    	return redirect()->back()->with('success','Category Successfuly reStore');
    }

    //permanent delete
    public function pDelete($id)
    {
    	$delete = Category::onlyTrashed()->find($id)->forceDelete();
    	return redirect()->back()->with('success','Category Successfuly Permanently Deleted');
    }
    	

   
}
