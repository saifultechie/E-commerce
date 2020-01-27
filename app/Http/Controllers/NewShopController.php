<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;

class NewShopController extends Controller
{
    public  function index()
    {

       

        $newProducts=Product::where('publication_status' ,1)

                            ->orderBy('id','DESC')
                            ->take(8)
                            ->get();

    	return view('front-end.home.home', ['newProducts'=>$newProducts]);
    }


    public function categoryProduct($id)
    {
        $categoryproducts = Product::where('category_id', $id)

                            ->where('publication_status', 1)
                            ->get();

       

    	return view('front-end.category.category-content', ['categoryproducts' =>$categoryproducts]);
    }


    public function productDetails($id)
    {

        $product= Product::find($id);

        return view('front-end.product.product-detail',['product'=>$product]);


    }

    public function mailUs()
    {
    	return view('front-end.mail.mail');
    }
}
