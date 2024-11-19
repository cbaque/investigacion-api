<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Response;

class DepartamentController extends Controller
{
    public function index()
    {
        try {

            $data = Departament::get();
            return response_data($data, Response::HTTP_OK, 'Roles leidos correctamente.', true);

        } catch (\Exception $ex) {

            return response_data(null, Response::HTTP_BAD_REQUEST , $ex->getMessage() );
        }
    }
}
