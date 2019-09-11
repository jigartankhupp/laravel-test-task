<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Requests\ValidateProductData;

class ProductController extends Controller
{
    Private $model;
    public function __construct(Product $model) {
        $this->model = $model;
    }

    public function addProduct()
    {
    	return view('product.addproduct');
    }
    public function storeProduct(ValidateProductData $request)
    {
    	$validated = $request->validated();
                  		
        $result = $this->model->insertProduct($request);
        return redirect('product/list');


    }
    public function productList()
    {
    	$productData = $this->model->fetchAllProduct();
    	return view('product.productlist',compact('productData'));
    }
    public function getProduct($productId)
    {
    	$productData = $this->model->getProduct($productId);
    	return view('product.addproduct',compact('productData'));

    }
    public function updateProduct(Request $request,$id)
    {    	
    	$productData = $this->model->updateProduct($request,$id);
    	return redirect('product/list');    	
    }

    public function deleteProduct($id)
    {    	
    	$productData = $this->model->deleteProduct($id);

    	return redirect('product/list');
    }
    public function getProductInfo($id)
    {
        $productData =Product::find($id); 
        $categoryData = $this->model->getAllCategoryInfo($id);
       return view('product.detailview',compact('productData','categoryData'));
    }
}
