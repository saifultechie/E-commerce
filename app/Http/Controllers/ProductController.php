<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Brand;
use Image;
use DB;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {

    	$categories = Category::where('publication_status' ,1)->get();
    	$brands = Brand::where('publication_status' ,1)->get();
    	return view('admin.product.add-product', [
    		'categories' => $categories,
    		'brands'     => $brands
    		]);
    }


    protected function productValidateInfo($request)
    {
    	$this->validate($request , [

    		'category_id'       =>'required',
    		'brand_id'          =>'required',
    		'product_name'      =>'required',
    		'product_price'     =>'required',
    		'product_quantity'  =>'required',
    		'short_description' =>'required',
    		'long_description'  =>'required',
    		'product_image'     =>'required',
    		'publication_status'=>'required'

    		]);

    }

    protected function productImageUpload($request)
    {


    	$productImage = $request->file('product_image');



    	$filetype = $productImage->getClientOriginalExtension();
    	$imageName= $request->product_name.'.'.$filetype;

    	$directory ='product-image/';

    	$imageUrl =$directory.$imageName;

    	//$productImage->move($directory, $imageName);

    	Image::make($productImage)->resize(200,200)->save($imageUrl);

    	return $imageUrl;

    }


    protected function productSaveBasicInfo($request , $imageUrl)
    {

    	$product = new Product();

    	$product->category_id       =$request->category_id;
    	$product->brand_id          =$request->brand_id;
    	$product->product_name      =$request->product_name;
    	$product->product_price     =$request->product_price;
    	$product->product_quantity  =$request->product_quantity;
    	$product->short_description =$request->short_description;
    	$product->long_description  =$request->long_description;
    	$product->product_image     =$imageUrl;
    	$product->publication_status=$request->publication_status;

    	$product->save();

    }

    public function saveProduct(Request $request)
    {

    	$this->productValidateInfo($request);

    	$imageUrl =$this->productImageUpload($request);

    	$this->productSaveBasicInfo($request , $imageUrl);

    	return redirect('/add/product')->with('message','product info save ssuccesfully');


    	

    	


    }

    public function manageProduct()
    {
    	$products = DB::table('products')
    				->join('categories','products.category_id','=','categories.id')
    				->join('brands','products.brand_id','=','brands.id')
    				->select('products.*','categories.category_name','brands.brand_name')
    				->get();

    	

    	return view('admin.product.manage-product', ['products'=>$products]);
    	
    }


    public function editProduct($id)
    {
    	$product= Product::find($id);
    	$categories = Category::where('publication_status' ,1)->get();
    	$brands = Brand::where('publication_status' ,1)->get();
    	return view('admin.product.edit-product' ,['product'=>$product,'categories'=>$categories,'brands'=>$brands]);

    }


    public function updateProductBasicInfo($product ,$request ,$imageUrl=null){

    	    $product->category_id               =$request->category_id;
    		$product->brand_id                  =$request->brand_id;
    		$product->product_name              =$request->product_name;
    		$product->product_price             =$request->product_price;
    		$product->product_quantity          =$request->product_quantity;
    	
    		$product->short_description         =$request->short_description;
    		$product->long_description          =$request->long_description;
    		if($imageUrl){
    		$product->product_image             =$imageUrl;

    		}
    	
    		$product->publication_status        =$request->publication_status;
    		$product->save();



    }


    public function updateProduct(Request $request)
    {

    	$productImage=$request->file('product_image');
    	$product =Product::find($request->product_id);


    	if($productImage){

    		
    		unlink($product->product_image);

    		$imageUrl=$this->productImageUpload($request);
    		$this->updateProductBasicInfo($product ,$request ,$imageUrl);

    		

    		




    	}else{

    	

    		$this->updateProductBasicInfo($product ,$request);

    		



    	}

    	return redirect('/manage/product')->with('message' ,'product update');



    }
}

























