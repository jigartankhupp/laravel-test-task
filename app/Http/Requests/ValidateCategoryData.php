<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCategoryData extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if( $this->is('category/store') ) {
            return $this->createRules();
            return $this->messages();
        } 
        elseif ( $this->is('category/update/{id}') ) {
            return $this->updateRules();
            return $this->messages();
        }
    }

    public function createRules()
    {
        return [
            'product' => 'required',         
            'category_name' =>'required',
            'image' => 'required',     
            'price' => 'required|numeric',                       
        ];
    }
   

    public function messages()
    {
        return [
            'product' => 'plese select product',
            'category_name' => 'The product_name field is required',
            'price' =>'Please enter price',
            'image' => 'Please select image',                                      
        ];
    }
}
