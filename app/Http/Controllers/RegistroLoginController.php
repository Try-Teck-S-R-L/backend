<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use App\Models\delegados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegistroLoginController extends Controller
{
    //function registrar(){}

    public function verificar(Request $request)
    {

        if (Session::has('loginId')) {
            Session::pull('loginId');
        }

        $userInfo = delegados::where('correoDelegado', '=', $request->correoDelegado)->first();

        if ($userInfo) {
            //if (Hash::check($request->password, $userInfo->password)) {
            if ($request->contraseniaDelegado == $userInfo->contraseniaDelegado) {
                $request->session()->put('loginId', $userInfo->id);
                Session::save();
                return response(['exito', Session::get('loginId')]);
                //return redirect('dashboard');
            } else {
                return response(['fail', 'contrasena no coincide']);
            }
        } else {
            return response(['fail', $request->correoDelegado, 'este email no esta registrado']);
        }
        /*if (!$userInfo) {
            //return back()->with('fail', 'No reconocemos tu correo electronico');
            return response(['message' => 'credencial invalida']);
        } else {
            if ($request->contrasenaDelegado == $userInfo->contrasenaDelegado) {
                $request->session()->put('LoggedUser', $userInfo->idDelegado);
            } else {
                //return response(['user' => session()->get()]);
            }
        }*/
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
        }
    }


    public function prueba()
    {
        return response(['message', Session::get('loginId')]);
    }
}
