<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{  
    use Notifiable;
    use SoftDeletes;
    protected $table = 'pm_product';
    protected $primaryKey = 'id'; 
    protected $guarded = ['id'];
     
    public function insertProduct($request)
    {
    	$productData = Product::latest()->first();   
    	if($productData)
    	{
    		$product_id = $productData->id;
    		$product_id++;
    	}else {
    		$product_id=1;
    	} 	
    	

    	$product_name =$request->product_name;
    	$description = $request->description;
    	
    	$path = $product_id.'_'.time().rand(0,9999).'.'.$request->image->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('public/product',$path); 

        $data = [
        			'product_name' =>$product_name,
        			'description' =>$description,
        			'product_image' =>$imagePath, 
        		];

        return $result = Product::create($data);
    }

    public function fetchAllProduct()
    {
    	return $productData = Product::paginate(10);
    }

    public function getProduct($productId)
    {
    	return $data = Product::find($productId);
    }

    public function updateProduct($request,$id)
    {
    	$product_name = $request->product_name;
    	$description = $request->description;

    	$updateData = [
    		'product_name' =>$product_name,
    		'description' =>$description
    	];

    	return $result = Product::where('id',$id)->update($updateData);
    	
    }
    public function deleteProduct($id)
    {
    	return $result = Product::where('id',$id)->delete();

    }
}
