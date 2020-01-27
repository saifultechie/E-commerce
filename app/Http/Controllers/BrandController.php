<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;

class BrandController extends Controller
{
    
    public function index()
    {
        return view('admin.brand.add-brand');
    }

    public function create()
    {
        //
    }

   
    public function saveBrand(Request $request)
    {
        $this->validate($request ,[

            'brand_name'        =>'required|alpha|max:15|regex:/^[\pL\s\-]+$/u|min:5',
            'brand_description' =>'required',
            'publication_status'=>'required'

            ]);



        $brand = new Brand();

        $brand->brand_name         =$request->brand_name;
        $brand->brand_description  =$request->brand_description;
        $brand->publication_status =$request->publication_status;

        $brand->save();

        return redirect('/manage/brand')->with('message','barnd info  add succesfully');
        
    }

    public function show()
    {

        $brands = Brand::all();

        return view('admin.brand.manage-brand',['brands'=>$brands]);

        
    }


    public function unpublished($id)
    {

        $brand = Brand::find($id);

        $brand->publication_status=0;
        $brand->save();

        return redirect('/manage/brand')->with('message' ,'unpublished succesfully');


    }

     public function published($id)
    {

         $brand = Brand::find($id);

        $brand->publication_status=1;
        $brand->save();

        return redirect('/manage/brand')->with('message' ,'published succesfully');

        
    }

   
    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('admin.brand.edit-brand',['brand'=>$brand]);
    }

  
    public function update(Request $request)
    {


        $this->validate($request ,[

            'brand_name'        =>'required|alpha|max:15|regex:/^[\pL\s\-]+$/u|min:5',
            'brand_description' =>'required',
            'publication_status'=>'required'

            ]);



        $brand = Brand::find($request->brand_id);

        $brand->brand_name          =$request->brand_name;
        $brand->brand_description   =$request->brand_description;
        $brand->publication_status  =$request->publication_status;

        $brand->save();

        return redirect('/manage/brand')->with('message','edit successfully');

    }

    public function destroy($id)
    {
        $brand = Brand::find($id);

        $brand->delete();

        return redirect('/manage/brand')->with('message','delete successfully');
    }
}
