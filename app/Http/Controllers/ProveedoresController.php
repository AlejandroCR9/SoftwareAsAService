<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\proveedores;
use App\Http\Requests\ProveedoresRequest;
use Illuminate\Support\Facades\Hash;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\trabajadores  $model
     * @return \Illuminate\View\View
     */
    public function index(proveedores $model)
    {
        return view('proveedores.index', ['proveedores' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\TrabajadoresRequest  $request
     * @param  \App\trabajadores  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProveedoresRequest $request, proveedores $model)
    {
        //print_r($request->all());
        $model->create($request->all());

        return redirect()->route('proveedores.index')->withStatus(__('Proveedor creado exitosamente.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  id del trabajador $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $proveedor=proveedores::find($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProveedoresRequest $request, proveedores  $proveedores, $id)
    {   
        $prove =proveedores::findOrFail($id);
        $prove->update($request->all());
        return redirect()->route('proveedores.index')->withStatus(__('Proveedor modificado exitosamente.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  id del trabajador $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( $id)
    {
        //$trabajador->delete();
        try{
            proveedores::find($id)->delete();
            return redirect()->route('proveedores.index')->withStatus(__('Proveedor elimindado exitosamente.'));
        }catch(Exception $ex){
            //return response()->json([
              //  'error' => 'Hubo un error al eliminar el registro con id: '.$id. ' : '.$ex->getMessage()
            //], 400);
        }
        
        
    }
}