<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\ResearchArticles;
use App\Models\ResearchArticlesMembers;
use App\Models\ResearchArticlesBudgets;
use App\Models\People;
use App\Models\User;
use App\Models\Business;

class ResearchArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $researchArticles = ResearchArticles::with('members.user')
                                ->get();

            return response_data($researchArticles, Response::HTTP_OK, 'Datos Leídos correctamente.', true);

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

            $data = $request->validate([
                'code' => 'required',
                'name_project' => 'required',
                'faculty' => 'required',
                'rcu' => 'required',
                'status' => 'required'
            ]);

            $newData = new ResearchArticles();
            $newData->code = $request->code;
            $newData->name_project = $request->name_project;
            $newData->faculty = $request->faculty;
            $newData->rcu = $request->rcu;
            $newData->status = $request->status;
            $newData->impact = $request->impact;
            $newData->duration = $request->duration;
            $newData->date_ini = $request->date_ini;
            $newData->date_end = $request->date_end;
            $newData->advance = 0;
            // $newData->observation = null;
            $newData->save();
            
            foreach ($request->budgets as $budget) {
                ResearchArticlesBudgets::create([
                    'research_article_id' => $newData->id,
                    'year' => $budget['date'],
                    'amount' => $budget['value'],
                ]);
            }

            foreach ($request->members as $member) {

                $newPeople = new People();
                $newPeople->name = $member['name'];
                $newPeople->dni = $member['dni'];
                $newPeople->email = $member['email'];
                $newPeople->position = $member['departament'];
                $newPeople->save();

                $newUser = new User();
                $newUser->name = $member['name'];
                $newUser->email = $member['email'];
                $newUser->password = Hash::make($member['dni']);
                $newUser->business_id = $userBusiness->id;
                $newUser->people_id = $newPeople->id;
                $newUser->save();

                ResearchArticlesMembers::create([
                    'research_article_id' => $newData->id,
                    'user_id' => $newUser->id
                ]);
            }

            DB::commit();
            return response_data($request, Response::HTTP_CREATED, 'Archivo Investigación creado correctamente.', true);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
