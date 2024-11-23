<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\ResearchArticles;
use App\Models\ResearchArticlesMembers;

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

            $data = $request->validate([
                'code' => 'required',
                'name_project' => 'required',
                'faculty' => 'required',
                'rcu' => 'required',
                'status' => 'required',
                'advance' => 'required'
            ]);

            $newData = new ResearchArticles();
            $newData->code = $request->code;
            $newData->name_project = $request->name_project;
            $newData->faculty = $request->faculty;
            $newData->rcu = $request->rcu;
            $newData->status = $request->status;
            $newData->advance = $request->advance;
            $newData->impact = $request->impact;
            $newData->observation = $request->observation;
            $newData->duration = $request->duration;
            $newData->budget_one = $request->budget_one;
            $newData->budget_two = $request->budget_two;
            $newData->budget_three = $request->budget_three;
            $newData->save();

            $members = $request->input('members', []);
            foreach ($members as $memberId) {
                ResearchArticlesMembers::create([
                    'research_article_id' => $newData->id,
                    'user_id' => $memberId
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
