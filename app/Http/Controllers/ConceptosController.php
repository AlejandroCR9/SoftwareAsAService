<?php

namespace App\Http\Controllers;

use App\conceptos;
use Illuminate\Http\Request;
use App\Http\Requests\ConceptosRequest;
use Illuminate\Support\Facades\Hash;

class ConceptosController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\trabajadores  $model
     * @return \Illuminate\View\View
     */
    public function index(conceptos $model)
    {
        return view('conceptos.index', ['conceptos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('conceptos.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\TrabajadoresRequest  $request
     * @param  \App\trabajadores  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ConceptosRequest $request, conceptos $model)
    {
        $model->create($request->all());

        return redirect()->route('conceptos.index')->withStatus(__('Concepto creado exitosamente.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  id del trabajador $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $concepto=conceptos::find($id);
        return view('conceptos.edit', compact('concepto'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ConceptosRequest $request, conceptos  $concepto, $id)
    {   
        $concep =conceptos::findOrFail($id);
        $concep->update($request->all());
        return redirect()->route('conceptos.index')->withStatus(__('Concepto modificado exitosamente.'));
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
            conceptos::find($id)->delete();
            return redirect()->route('conceptos.index')->withStatus(__('Concepto elimindado exitosamente.'));
        }catch(Exception $ex){
            //return response()->json([
              //  'error' => 'Hubo un error al eliminar el registro con id: '.$id. ' : '.$ex->getMessage()
            //], 400);
        }
        
        
    }
}
