<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['find']]);
    }
    public function find(Request $request)
    {
        return Oferta::find([
            'id' => $request->header('id'),
        ])->with('users')->get();
    }

    public function getOfertaWithAssociatedUser()
    {
        $oferta = Oferta::has('users')
            ->with('users')->get();
        if (count($oferta) > 0) {
            return response()->json([
                'message' => '',
                'ofertas' => $oferta
            ], 200);
        } else {
            return response()->json([
                'message' => 'No existen ofertas con usuarios asociados',
                'ofertas' => null
            ], 200);
        }
    }
}
