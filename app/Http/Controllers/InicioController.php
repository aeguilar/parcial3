<?php
namespace uees;
//namespace uees\app;
namespace uees\Http\Controllers;
//use uees;
use app\Perfil ;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InicioController extends Controller
{
    //

    public function index(){
    	//$perfiles= uees\Http\Controllers\app\Perfil::all();
    	//$perfiles= app\Perfil::lists('IdPerfil','Nombre');

    	$perfiles=DB::table('perfil')->get();

    	 return view('/AdminLTE/login', compact('perfiles'));
    }

    public function form(Request $request){
    	$InicioSesion = $request->input('InicioSesion');
    	$Clave =$request->input('Clave');
    	$perfil=$request->get('perfil');

    	//$result =DB::select("call pa_seg_VerificarClave('".$InicioSesion."','".$Clave."')";

     $result =DB::table('usuario')->select(DB::raw('count(*) as CuentaValida'))->where('InicioSesion', '=', $InicioSesion)->orWhere(DB::raw("AES_DECRYPT(Clave,'llave')"), '=', $Clave)->count();


    	return view('/AdminLTE/index');
    }


  public function getpersonas(){

    $personas=DB::table('persona')->get();




    $aResponse = \Response::json(array(  
              
            "persona" => $personas,
            "success" => true
        ));
     return $aResponse;
  }


}
