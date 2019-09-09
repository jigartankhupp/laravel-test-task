<?php

namespace App\Http\Middleware;

use Closure;
use App\CommanModel;


class VerifyIsAdmin
{

    Private $modelObj;
    public function __construct(CommanModel $model) {
        $this->modelObj = $model;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $result = $this->modelObj->VerifyIsAdmin();
         //return response()->json($result,401);

        if($result)
        {
             
             return $next($request);
        }
        else{
            $result = array('success'=> false,'response'=> array('message'=> 'Unauthorized User.','result'=>[]));
            return response()->json($result,401);
        }
       
    }
}
