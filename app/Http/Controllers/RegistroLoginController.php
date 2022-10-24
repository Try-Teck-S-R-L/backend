<?php

namespace App\Http\Controllers;

use App\Models\Delegado;
use Illuminate\Http\Request;

class RegistroLoginController extends Controller
{
    //function registrar(){}

    function iniciar(Request $request)
    {

        $userInfo = Delegado::where('correoDelegado', '=', $request->correoDelegado)->first();

        if (!$userInfo) {
            return back()->with('fail', 'No reconocemos tu correo electronico');
        } else {
            if ($request->contrasenaDelegado == $userInfo->contrasenaDelegado) {
                $request->session()->put('LoggedUser', $userInfo->idDelegado);
            } else {
                return back()->with('fail', 'Contrasena incorrecta');
            }
        }
    }
}
