<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\ValidateCategoryData;

class CategoryController extends Controller
{
	Private $model;
    public function __construct(Category $model) {
        $this->model = $model;
    }
    
    public function addCategory()
    {
    	$allProduct = Product::all();
    	$allProduct = $allProduct->toArray();    	
    	return view('category.addcategory',compact('allProduct'));
    }
    public function storeCategory(ValidateCategoryData $request)
    {   	
    	$validated = $request->validated();
    	$result = $this->model->insertCategory($request);
    }
}
