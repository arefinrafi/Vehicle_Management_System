<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Category;

class IndexController extends Controller
{
    public function index(){




    	//In ascending Order
            	$vehiclesAll = Vehicle::get();

            	//In descending Order
            	$vehiclesAll = Vehicle::orderBy('id','DESC')->paginate(6);
            	
            	//In random order
            	/*$vehiclesAll = Vehicle::inRandomOrder()->paginate(3);
*/
            	//Get all categories and sub categories
            	$categories = Category::with('categories')->where(['parent_id'=>0])->get();
            	//$categories = json_encode(json_encode($categories));
            	//echo "<pre>";  print_r($categories); die;

            	return view('index')->with(compact('vehiclesAll','categories'));

    }
    public function usersignin()
    {
    return view('frontend.pages.usersignin');

    }
}
