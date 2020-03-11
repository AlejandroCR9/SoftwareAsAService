<?php

namespace App\Http\Controllers;

use App\planos;
use Illuminate\Http\Request;
use App\Http\Requests\PlanosRequest;
use Illuminate\Support\Facades\Hash;

class PlanosController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\trabajadores  $model
     * @return \Illuminate\View\View
     */
    public function index(planos $model)
    {
        return view('planos.index', ['planos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('planos.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\TrabajadoresRequest  $request
     * @param  \App\trabajadores  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlanosRequest $request, planos $model)
    {
        $model->create($request->all());

        return redirect()->route('planos.index')->withStatus(__('Plano creado exitosamente.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  id del trabajador $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $planos=planos::find($id);
        return view('planos.edit', compact('planos'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PlanosRequest $request, planos  $planos, $id)
    {   
        $plano =planos::findOrFail($id);
        $plano->update($request->all());
        return redirect()->route('planos.index')->withStatus(__('Plano modificado exitosamente.'));
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
            planos::find($id)->delete();
            return redirect()->route('planos.index')->withStatus(__('Plano elimindado exitosamente.'));
        }catch(Exception $ex){
            //return response()->json([
              //  'error' => 'Hubo un error al eliminar el registro con id: '.$id. ' : '.$ex->getMessage()
            //], 400);
        }
        
        
    }
}
