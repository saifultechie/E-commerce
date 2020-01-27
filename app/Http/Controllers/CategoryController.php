<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    public function index() {
        return view('admin.category.add-category');
    }

    public function saveCategoryInfo(Request $request) {
       $category = new Category();
       $category->category_name = $request->category_name;
       $category->category_description = $request->category_description;
      $category->publication_status = $request->publication_status;
       $category->save();

//        Category::create($request->all());

//          DB::table('categories')->insert([
//              'category_name'           => $request->category_name,
//              'category_description'    => $request->category_description,
//              'publication_status'      => $request->publication_status
//          ]);



        return redirect('/category/add')->with('message','category  add successfully');

    }


    public function manageCategoryInfo()
    {



      $categories =Category::all();

      return view('admin.category.manage-category' ,['categories' =>$categories]);

    }


    public function unpublishedCategoryInfo($id)
    {



      $category= Category::find($id);

      $category->publication_status =0;
      $category->save();

      return redirect('/category/manage')->with('message',' unpublished succesfully');

    }

     public function publishedCategoryInfo($id)
    {



      $category= Category::find($id);

      $category->publication_status =1;
      $category->save();

      return redirect('/category/manage')->with('message',' published succesfully');

    }


      public function editCategoryInfo($id)
    {

      $category = Category::find($id);



      return view('admin.category.edit-category' ,['category'=>$category]);



    }

      public function UpdateCategoryInfo(Request $request)
    {

      $category = Category::find($request->category_id);

      $category->category_name        = $request->category_name;
      $category->category_description = $request->category_description;
      $category->publication_status   = $request->publication_status;
      $category->save();

      if($category->save())
      {
        return  redirect('/category/manage')->with('message','category update successfully');
      }






    }

       public function deleteCategoryInfo($id)
    {

      $category = Category::find($id);

      $category->delete();
      
      return  redirect('/category/manage')->with('message','category delete successfully');
      






    }



}
