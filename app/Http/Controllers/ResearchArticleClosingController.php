<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\ResearchArticles;

class ResearchArticleClosingController extends Controller
{

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

            $research->status = $request->status;
            $research->save();

            DB::commit();
            return response_data($research, Response::HTTP_CREATED, 'Proyecto Finalizado correctamente...', true);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response_data(null, Response::HTTP_BAD_REQUEST , $ex->getMessage() );
        }
    }
}
