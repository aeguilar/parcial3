<?php

namespace uees\Http\Controllers;
namespace uees\app;
use app\Perfil;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PruebaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


     public function getPerfiles(Request $request)
    {
        // Validate the request...

        $perfil = new Perfil;

        $flight->name = $request->name;

        $flight->save();
    }



    public function index(){
    	 return view('/AdminLTE/login');
    }
    
}
