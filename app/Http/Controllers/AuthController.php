<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\delegados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup', 'me', 'usuarioActual']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'email o contrasena incorrectos'], 401);
        }

        return $this->respondWithToken($token);
    }


    public function signup(SignUpRequest $request)
    {

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->role = 'delegado';
        $newUser->save();
        //$user = User::create($request->all());

        $delegado = new delegados();
        $delegado->nombreDelegado = $request->name;
        $delegado->correoDelegado = $request->email;
        $delegado->estado = 'en espera';
        $delegado->save();

        return $this->login($request);
    }

    public function setPasswordAttribute($value)
    {
        $this->attribute['password'] = bcrypt($value);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }


    public function usuarioActual(Request $request)
    {
        //return Auth::user();
        $token = JWTAuth::parseToken();
        //Try authenticating user       
        $user = $token->authenticate();

        //$user = JWTAuth::toUser();
        return response()->json(compact('token', 'user'));
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    /*public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }*/

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            //'expires_in' => auth()->factory()->getTTL() * 60
            'user' => auth()->user()->name
        ]);
    }
}
