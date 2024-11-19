<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use Illuminate\Http\Response;


class ModeController extends Controller
{
    public function index()
    {
        try {
            $modes = Mode::get();
            return response_data($modes, Response::HTTP_OK, 'Datos Leídos correctamente.', true);
        } catch (\Exception $ex) {
            return response_data([], Response::HTTP_BAD_REQUEST, 'Error al procesar la petición');
        }
    }
}
