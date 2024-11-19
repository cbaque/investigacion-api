<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Business;
use App\Models\Role;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only(['destroy']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $loginData = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // $business = Business::where('ruc', $loginData['business'])->first();
            // if (!isset($business)) {
            //     throw new \ErrorException( 'Empresa no existe, verificar');
            // }

            $user = User::where('email', $loginData['email'])->first();

            if (!$user || !\Hash::check($loginData['password'], $user->password)) {
                throw new \ErrorException('Credenciales Incorrectas.');
            }

            // if (!Auth::attempt(['email' => $loginData['email'], 'password' => $loginData['password']])) {
            //     throw new \ErrorException( 'Credenciales Incorrectas.');
            // }
            

            // $user = Auth::user();

            // if ($user->business_id !== $business->id) {
            //     throw new \ErrorException( 'Usuario no pertenece a esa empresa.');
            // }

            // $user = User::find($user->id);

            $tokenResult = $user->createToken('appToken');
            $token = $tokenResult->accessToken;

            $roles = $user->getRoleNames();
            $role = $roles->first();

            $roleModel = Role::where('name', $role)->first();
            $menu = $roleModel->menus;
            
            return response_data([
                'user' => $user->name,
                'business' => $user->business->name,
                'token' => $token,
                'rol' => $roles,
                'menu' => $menu
            ], Response::HTTP_OK, 'Login correctamente.', true);


        } catch (\Exception $ex) {

            return response_data(null, Response::HTTP_BAD_REQUEST , $ex->getMessage() );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        try {
            // $user = Auth::user();
            // $user = User::find($user->id);
            // // $user->tokens()->delete();
            // $user->tokens()->revoke();

            $token = Auth::user()->token();
            $token->revoke();

            return response_data(null, Response::HTTP_OK, 'Logout correctamente.', true);

        } catch (\Exception $ex) {
            return response_data(null, Response::HTTP_BAD_REQUEST , $ex->getMessage() );
        }
    }
}
