<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Category;

class Product extends Model
{  
    use Notifiable;
    use SoftDeletes;
    protected $table = 'pm_product';
    protected $primaryKey = 'id'; 
    protected $guarded = ['id'];
     
    /**
     * getCreatedAtAttribute - implement getter setter for convert date formate
     *   
     * @param  date - database- created_at
     * @return formated date
     */
    public function getCreatedAtAttribute($date) 
    {       
        
        $date =  Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-M-Y');
        return $date;
    }

      /**
     * insertProduct - Product will be insert here
     *   
     * @param  request - all param related to product  
     * @return redirect to home
     */
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

    /**
     * fetchAllProduct - Fetch all product
     *       
     * @return product array
     */
    public function fetchAllProduct()
    {
    	return $productData = Product::orderBy('id','DESC')->paginate(10);
    }
     /**
     * getProduct - Fetch single  product
     *       
     * @return product object
     */

    public function getProduct($productId)
    {
    	return $data = Product::find($productId);
    }
      /**
     * updateProduct - upodate single product
     * 
     * @param request  - all property
     * @param id  - product id      
     * @return product object
     */
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
     /**
     * deleteProduct - Delete single  product
     *       
     * @return true
     */
    public function deleteProduct($id)
    {
    	return $result = Product::where('id',$id)->delete();

    }
    /**
     * getProductInfo - get product full info
     *    
     * @param  id  - productId   
     * @return product data
     */
    public function getAllCategoryInfo($id)
    {
        return $data = Category::where('product_id',$id)->get();
    }

}
