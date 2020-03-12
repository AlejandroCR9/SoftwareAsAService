<?php

namespace App\Http\Controllers;

use App\proyectos;
use App\clientes;
use App\trabajadores;
use Illuminate\Http\Request;
use App\Http\Requests\ProyectosRequest;
use Illuminate\Support\Facades\Hash;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\trabajadores  $model
     * @return \Illuminate\View\View
     */
    public function index(proyectos $model)
    {
        $proyectos= proyectos::join("clientes","proyectos.fk_id_cliente","=","clientes.id")->join("trabajadores","proyectos.fk_id_lider","=","trabajadores.id")->get();
        //print_r(compact($proyectos));
        return view('proyectos.index', ['proyectos' => $proyectos]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clientes = clientes::all();
        $trabajadores = trabajadores::where("puesto","=","Director de proyectos")->get();
        //print_r($trabajadores);     
        return view('proyectos.create', ['info' => $trabajadores],['clientes' => $clientes] );
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\TrabajadoresRequest  $request
     * @param  \App\trabajadores  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProyectosRequest $request, proyectos $model)
    {
        $model->create($request->all());

        return redirect()->route('proyectos.index')->withStatus(__('Proyecto creado exitosamente.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  id del trabajador $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $proyectos=proyectos::find($id);
        return view('proyectos.edit', compact('proyectos'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProyectosRequest $request, proyectos  $proyectos, $id)
    {   
        $proy =proyectos::findOrFail($id);
        $proy->update($request->all());
        return redirect()->route('proyectos.index')->withStatus(__('Proyecto modificado exitosamente.'));
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
            proyectos::find($id)->delete();
            return redirect()->route('proyectos.index')->withStatus(__('Proyecto elimindado exitosamente.'));
        }catch(Exception $ex){
            //return response()->json([
              //  'error' => 'Hubo un error al eliminar el registro con id: '.$id. ' : '.$ex->getMessage()
            //], 400);
        }
        
        
    }
}
