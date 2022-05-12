<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function list()
    {
        return User::all();
    }

    public function find(Request $request)
    {
        return User::find([
            'id' => $request->header('id'),
        ]);
    }

    public function getAll()
    {
//        return Oferta::where('_id', '=', '627a957ed2daba122c0ebe27')
//            ->with('users')->get();
//        $oferta = Oferta::find('627a957ed2daba122c0ebe27');
//        $oferta = Oferta::has('users')->get();
        $users = User::with('ofertas')->get();
//        dd($oferta);
        return $users;
//        return $oferta->users;
//        return $ofertas->users()->get();
    }

}
