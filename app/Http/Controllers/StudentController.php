<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public  function index()
    {

    	$name= "robin  hood  panday";
    	$age='78';
    	//return view('home',compact('name'));

    	//return view('home')
    				//->with('a',$name)
    				//->with('b',$age);

    	return view('home', [

    			'a'=>$name,
    			'b' =>$age
    		]);
    }

    public  function add()
    {
    	return view('welcome');
    }
}
