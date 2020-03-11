<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\trabajadores;
use App\Http\Requests\TrabajadoresRequest;
use Illuminate\Support\Facades\Hash;

class TrabajadoresController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\trabajadores  $model
     * @return \Illuminate\View\View
     */
    public function index(trabajadores $model)
    {
        return view('trabajadores.index', ['trabajadores' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('trabajadores.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\TrabajadoresRequest  $request
     * @param  \App\trabajadores  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TrabajadoresRequest $request, trabajadores $model)
    {
        $model->create($request->all());

        return redirect()->route('trabajadores.index')->withStatus(__('Trabajador creado exitosamente.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\View\View
     */
    public function edit(trabajadores $trabajador)
    {
        return view('trabajadores.edit', compact('trabajador'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TrabajadoresRequest $request, trabajadores  $trabajador)
    {
        $model->update($request->all());

        return redirect()->route('trabajadores.index')->withStatus(__('Trabajador modificado exitosamente.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(trabajadores  $trabajador)
    {
        $trabajador->delete();

        return redirect()->route('trabajadores.index')->withStatus(__('Trabajador elimindado exitosamente.'));
    }
}

