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
        $allProduct = $this->model->getAllProduct();

    	return view('category.addcategory',compact('allProduct'));
    }
    public function storeCategory(ValidateCategoryData $request)
    {   	
    	$validated = $request->validated();
    	$result = $this->model->insertCategory($request);
        return redirect('category/list');
    }
    public function categoryList()
    { 
        $categoryData = $this->model->fetchAllCategory();
        return view('category.categorylist',compact('categoryData'));
    }
    public function getCategory($categoryId)
    {
        $categoryData = $this->model->getCategory($categoryId);
        $allProduct = $this->model->getAllProduct();

        return view('category.addcategory',compact('categoryData','allProduct'));

    }
    public function updateCategory(Request $request,$id)
    {       
        $categoryData = $this->model->updateCategory($request,$id);
        return redirect('category/list');        
    }
    public function deleteCategory($id)
    {       
        $categoryData = $this->model->deleteCategory($id);

        return redirect('category/list');
    }
}
