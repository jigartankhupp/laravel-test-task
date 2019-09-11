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

     /**
     * Initialize the object.
     *  
     * @param  \User  
     * @return class object
     */
    public function __construct(User $model) {
        $this->model = $model;
    }

     /**
     * Navigate user to proper location.
     *   
     * @return view/dashboard
     */

    public function index()
    { 
        if(Auth::check())
            {
                return redirect('dashboard');
            }else{
                return view('login');
            }
    }
     /**
     * User will signup
     *  
     * @param  \StoreUser class  
     * @return redirect to dashboard if signup
     */

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
      /**
     * Naviagate to login view
     *      
     * @return login view
     */
    public function getLogin()
    {
    	return view('login');
    }
      /**
     * verify user login detail
     *  
     * @param  \StoreUser class  
     * @return redirect to dashboard if valid
     */
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
      /**
     * User will logout
     *     
     * @return redirect to home
     */
    public function userLogout()
    {
        Session::flush();       
        Auth::logout();      
        return redirect('/');
    }
     /**
     * User naviagate to dashboard
     *     
     * @return redirect to dashbord
     */
    public function dashboard()
    {
        if(Auth::check())
        {
    	return view('admin.dashboard');
        }
        else{
            return view('login');
        }
    }
}

 
