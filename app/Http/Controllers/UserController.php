<?php

namespace App\Http\Controllers;

use App\User;
use App\historial;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        $a = array('fk_id_usuario' => $_COOKIE['ses'], 'accion' => 'Crear', 'lugar' => 'Usuario con nuevo. ');
        historial::create($a );
        return redirect()->route('user.index')->withStatus(__('Usuario creado.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $r=compact('user');
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));
        $a = array('fk_id_usuario' => $_COOKIE['ses'], 'accion' => 'Editar', 'lugar' => 'Usuario ');
        historial::create($a );
        return redirect()->route('user.index')->withStatus(__('Usuario modificado.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();
        $a = array('fk_id_usuario' => $_COOKIE['ses'], 'accion' => 'Eliminar', 'lugar' => 'Usuario');
        historial::create($a );
        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
