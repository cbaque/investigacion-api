<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;

use App\Models\State;


class StateController extends Controller
{
    public function index()
    {
        try {
            $states = State::get();
            return response_data($states, Response::HTTP_OK, 'Datos Leídos correctamente.', true);
        } catch (\Exception $ex) {
            return response_data([], Response::HTTP_BAD_REQUEST, 'Error al procesar la petición');
        }
    }
}
