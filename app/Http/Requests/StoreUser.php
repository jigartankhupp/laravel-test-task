<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class StoreUser extends FormRequest
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
        if( $this->is('user/signup') ) {
            return $this->createRules();
            return $this->messages();
        } 
        elseif ( $this->is('user/login') ) {
            return $this->loginRules();
            return $this->messages();
        }
    }

    public function createRules()
    {
        return [
            'name' => 'required',         
            'email' =>'required|email|unique:users,email',
            'password' => 'required|Min:4',   
            'confirmpassword'=> 'required|same:password',                       
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'email' =>'Please enter valid email',
            'password' => 'Please enter strong password',   
            'confirmpassword'=> 'confirmpassword does not match to password',                            
          
        ];
    }
    public function loginRules()
    {
        return [               
            'email' =>'required|email',
            'password' => 'required|Min:4',                         
        ];
    }
}               
