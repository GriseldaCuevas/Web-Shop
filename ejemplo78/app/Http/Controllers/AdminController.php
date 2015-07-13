<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Admin;

class AdminController extends Controller{

    public function index(){
        return view('admin.login');
    }

    public function login(Request $request){
        $usuario = $request->input('usuario');
        $pass = sha1($request->input('pass'));
        $admin = Admin::login($usuario, $pass);

        if(count($admin) != 0){
            if($admin[0]->admin == 1){
                \Session::put('logeado_admin', true);
                \Session::put('admin', $usuario);
                \Session::put('id_admin', $admin[0]->id);
                return \Redirect::to('/admin/inicio');
            }else
                return \Redirect::back()->with(array('error_login' => true, 'mensaje' => 'No esta autorizado como administrador del sitio'));
        }else    
            return \Redirect::back()->with(array('error_login' => true, 'mensaje' => 'No esta autorizado para acceder a este sitio'));
    }

    public function logout(){
        \Session::flush();
        return \Redirect::to('/admin');
    }
}
