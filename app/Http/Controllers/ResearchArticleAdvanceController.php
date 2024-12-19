<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\ResearchArticles;

class ResearchArticleAdvanceController extends Controller
{
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
        //
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
            $research = ResearchArticles::find($id);
            if (!$research) {
                return response_data([], Response::HTTP_BAD_REQUEST, 'Proyecto no encontrado', false);
            }

            $research->advance = $request->advance;
            $research->save();

            DB::commit();
            return response_data($research, Response::HTTP_CREATED, 'Avance actualizado correctamente...', true);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response_data(null, Response::HTTP_BAD_REQUEST , $ex->getMessage() );
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
