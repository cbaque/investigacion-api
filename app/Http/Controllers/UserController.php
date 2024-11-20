<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Business;
use App\Models\People;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = auth()->user();
            $userBusiness = Business::find($user->business_id);

            // $userBusiness = $userBusiness->users()->with('people')->paginate(10);
            $userBusiness = $userBusiness->users()->with(['people', 'roles'])->get();

            return response_data($userBusiness, Response::HTTP_OK, 'Datos Leídos correctamente.', true);
        } catch (\Exception $ex) {
            return response_data([], Response::HTTP_BAD_REQUEST, 'Error al procesar la petición');
        }
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
        DB::beginTransaction();

        try {

            $user = auth()->user();
            $userBusiness = Business::find($user->business_id);

            $userData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required',
                'position' => 'required',
            ]);

            $newPeople = new People();
            $newPeople->name = $request->name;
            $newPeople->email = $request->email;
            $newPeople->position = $request->position;
            $newPeople->departament_id = $request->departament;
            $newPeople->save();

            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->password = Hash::make($request->password);
            $newUser->business_id = $userBusiness->id;
            $newUser->people_id = $newPeople->id;
            $newUser->save();

            $role = Role::where('id', $request->role)->first();
            $newUser->assignRole($role);

            DB::commit();
            return response_data($newUser, Response::HTTP_CREATED, 'Usuario creado correctamente.', true);

        } catch (\Exception $ex) {
            DB::rollBack();
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
        DB::beginTransaction();

        try {

            $user = auth()->user();
            $userBusiness = Business::find($user->business_id);

            $userData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required',
                'position' => 'required',
                'departament' => 'required',
            ]);

            $user = User::find($id);
            if (!$user) {
                return response_data([], Response::HTTP_BAD_REQUEST, 'Usuario no encontrado.', false);
            }

            $people = People::where("id" , $user->people_id)->first();

            $people->name = $request->name;
            $people->email = $request->email;
            $people->position = $request->position;
            $people->departament_id = $request->departament;
            $people->save();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->business_id = $userBusiness->id;
            $user->people_id = $people->id;
            $user->save();

            $role = Role::where('id', $request->role)->first();
            $user->assignRole($role);

            DB::commit();

            return response_data($people, Response::HTTP_CREATED, 'Usuario actualizado correctamente.', true);

        } catch (\Exception $ex) {
            DB::rollBack();
            return response_data([], Response::HTTP_BAD_REQUEST, $ex->getMessage() );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
