<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ResearchArticleUploadDocController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        DB::beginTransaction();

        try {

            $user = auth()->user();
            if (!$request->hasFile('file')) {
                throw new \RuntimeException('No se envió ningún archivo.');
            }

            $file = $request->file('file');
            if (!$file->isValid()) {
                throw new \RuntimeException('El archivo no es válido.');
            }

            $filePath = $file->store('uploads', 'public');


            DB::commit();
            return response_data($request, Response::HTTP_CREATED, 'Archivo Investigación creado correctamente.', true);

        } catch (\Exception $ex) {
            DB::rollBack();
            return response_data(null, Response::HTTP_BAD_REQUEST , $ex->getMessage() );
        }
    }
}
