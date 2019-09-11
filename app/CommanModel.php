<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Auth;

class CommanModel extends Model
{
    
    public function VerifyIsAdmin()
    {   
    	$userRole = Auth::user()->role;
    	if($userRole =='admin')
    	{
    		return true;
    	}
    	
    }
    public function VerifyIsUser()
    {
    	$userRole = Auth::user()->role;
    	if($userRole =='user' || $userRole =='user')
    	{
    		return true;
    	}
    	

    }
}
