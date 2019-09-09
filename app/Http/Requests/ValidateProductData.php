<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProductData extends FormRequest
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
        if( $this->is('product/store') ) {
            return $this->createRules();
            return $this->messages();
        } 
        elseif ( $this->is('product/update/{id}') ) {
            return $this->updateRules();
            return $this->messages();
        }
    }

    public function createRules()
    {
        return [
            'product_name' => 'required',         
            'description' =>'required',
            'image' => 'required',                            
        ];
    }
    public function updateRules()
    {
        return [
            'product_name' => 'required',         
            'description' =>'required',
            'image' => 'required',                            
        ];
    }

    public function messages()
    {
        return [
            'product_name' => 'The product_name field is required',
            'description' =>'Please enter description',
            'image' => 'Please select image',                                      
        ];
    }
}
