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
    public function index(historial $model)
    {
        return view('historial.index', ['historial' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('historial.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\TrabajadoresRequest  $request
     * @param  \App\trabajadores  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HistorialRequest $request, historial $model)
    {
        $model->create($request->all());

        return redirect()->route('historial.index')->withStatus(__('Historial creado exitosamente.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  id del trabajador $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $historial=historial::find($id);
        return view('historial.edit', compact('historial'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HistorialRequest $request, historial  $historial, $id)
    {   
        $hist =historial::findOrFail($id);
        $hist->update($request->all());
        return redirect()->route('historial.index')->withStatus(__('Historial modificado exitosamente.'));
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
            historial::find($id)->delete();
            return redirect()->route('historial.index')->withStatus(__('Historial elimindado exitosamente.'));
        }catch(Exception $ex){
            //return response()->json([
              //  'error' => 'Hubo un error al eliminar el registro con id: '.$id. ' : '.$ex->getMessage()
            //], 400);
        }
        
        
    }
}
