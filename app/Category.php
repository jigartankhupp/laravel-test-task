<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	
    use SoftDeletes;
    protected $table = 'pm_category';
    protected $primaryKey = 'id'; 
    protected $guarded = ['id'];


    public function insertCategory($request)
    {
    	$categoryData = Category::latest()->first();   
    	if($categoryData)
    	{
    		$category_id = $categoryData->id;
    		$category_id++;
    	}else {
    		$category_id=1;
    	} 	
    	

    	$productId =$request->product;
    	$category_name =$request->category_name;    
    	$price = $request->price;
    	
    	$path = $category_id.'_'.time().rand(0,9999).'.'.$request->image->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('public/category',$path); 

        $data = [
        			'product_id'     =>$productId,        		
        			'category_image'  =>$imagePath, 
        			'category_name'  =>$category_name,        		
        			'price' =>$price,
        		];

        return $result = Category::create($data);
    }
    public function fetchAllCategory()
    {
    	return $categoryData = Category::orderBy('id','DESC')->paginate(10);
    }
    public function getCategory($categoryID)
    {
    	return $data = Category::find($categoryID);
    }
    public function getAllProduct()
    {
    	$allProduct = Product::all();
    	return $allProduct = $allProduct->toArray();  
    }
    public function updateCategory($request,$id)
    {
    	$category_name = $request->category_name;
    	$product = $request->product;    	
    	$price = $request->price;

    	$cateoryData = [
    		'category_name' =>$category_name,
    		'product_id' =>$product,
    		'price' =>$price,
    	];

    	return $result = Category::where('id',$id)->update($cateoryData);
    	
    }
    public function deleteCategory($id)
    {
    	return $result = Category::where('id',$id)->delete();

    }

}
