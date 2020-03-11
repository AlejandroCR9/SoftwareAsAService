<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clientes;
use App\Http\Requests\ClientesRequest;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\trabajadores  $model
     * @return \Illuminate\View\View
     */
    public function index(clientes $model)
    {
        return view('clientes.index', ['clientes' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\TrabajadoresRequest  $request
     * @param  \App\trabajadores  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientesRequest $request, clientes $model)
    {
        $model->create($request->all());

        return redirect()->route('clientes.index')->withStatus(__('Cliente creado exitosamente.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\View\View
     */
    public function edit(clientes $clientes)
    {
        return view('clientes.edit', compact('clientes'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ClientesRequest $request, clientes  $clientes)
    {
        $model->update($request->all());

        return redirect()->route('clientes.index')->withStatus(__('Cliente modificado exitosamente.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(clientes  $clientes)
    {
        $clientes->delete();

        return redirect()->route('clientes.index')->withStatus(__('Cliente elimindado exitosamente.'));
    }
}

