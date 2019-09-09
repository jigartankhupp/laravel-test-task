<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\User;
use Auth;	
use Lang;
use Session;

class UserController extends Controller
{
    Private $model;
    public function __construct(User $model) {
        $this->model = $model;
    }
    public function index()
    { 
        if(Auth::check())
            {
                return redirect('dashboard');
            }else{
                return view('login');
            }
    }

    public function userSignup(StoreUser $request)
    {
        $validated = $request->validated();

        $result = $this->model->createUser($request);
        if($result)
        {
            return redirect('dashboard');
        }else{
            return back()->with('error', Lang::get('msg.Something Wrong'));
        }
        
        
    }
   /* public function userSignup(StoreUser $request)
    {
        $validated = $request->validated();

    	$name = $request->name;
    	$email= $request->email;
    	$password = $request->password;

    	$data = [		
			'name'         => $name,		
            'email'        => $email,		
			'password'     => bcrypt($password)		
               ];
       return $result = User::create($data);
    }*/
    public function getLogin()
    {
    	return view('login');
    }
    public function userLogin(StoreUser $request)
    {
    	$validated = $request->validated();
        $email = $request->email;
    	$password =$request->password;

    	$user_data = [
            'email' => $request->email ,
            'password' => $request->password
        		];

        $remember_me = $request->has('remember') ? true : false;

        if (Auth::attempt($user_data, $remember_me))
        {           
           return redirect()->intended('dashboard');            
        }
        else
        {
            return back()->with('error', Lang::get('msg.Invalid credentials'));
        }
    }
    public function userLogout()
    {
        Session::flush();       
        Auth::logout();      
        return redirect('/');
    }
    public function dashboard()
    {
    	return view('admin.dashboard');
    }
}

 
