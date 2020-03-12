<?php

namespace App\Http\Controllers;

use App\historial;
use Illuminate\Http\Request;
use App\Http\Requests\HistorialRequest;
use Illuminate\Support\Facades\Hash;

class HistorialController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\trabajadores  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
          $historial= historial::join("users","historial.fk_id_usuario","=","users.id")->get();
        return view('historial.index', ['hist' => $historial]);
    }

}
