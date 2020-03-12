<?php

namespace App\Http\Controllers;

use App\conceptos;
use App\proyectos;
use App\historial;
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
        $concepto= conceptos::join("proyectos","conceptos.fk_id_proyecto","=","proyectos.id")->get();

        return view('conceptos.index', ['conceptos' => $concepto]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $proyectos = proyectos::all();
    
        return view('conceptos.create', ['proyectos' => $proyectos] );
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
        //print_r($request->all());
        //$arrayName = array('descripcion' => $_POST['descripcion'],'unidad' => $_POST['unidad'],'cantidad' => $_POST['cantidad'], 'pu' => $_POST['pu'],'area' => $_POST['area'], 'fk_id_proyecto' => $_POST['fk_id_proyecto'], 'estado_conceptos' => $_POST['estado_conceptos']);
        //print_r($request->all());
        $model->create($request->all());
        //$a = array('fk_id_usuario' => $_COOKIE['ses'], 'accion' => 'Crear', 'lugar' => 'Concepto nuevo.');
        //historial::create($a);
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
        $proyectos = proyectos::all();
        return view('conceptos.edit', compact('concepto'),compact('proyectos'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\trabajadores  $trabajador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ConceptosRequest $request,  $id)
    {   
        $concep =conceptos::findOrFail($id);
        $concep->update($request->all());
        $a = array('fk_id_usuario' => $_COOKIE['ses'], 'accion' => 'Editar', 'lugar' => 'Concepto con id: '.$id);
        historial::create($a);
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
            $a = array('fk_id_usuario' => $_COOKIE['ses'], 'accion' => 'Eliminar', 'lugar' => 'Concepto con id: '.$id);
        historial::create($a);
            return redirect()->route('conceptos.index')->withStatus(__('Concepto elimindado exitosamente.'));
        }catch(Exception $ex){
            //return response()->json([
              //  'error' => 'Hubo un error al eliminar el registro con id: '.$id. ' : '.$ex->getMessage()
            //], 400);
        }
        
        
    }
}
