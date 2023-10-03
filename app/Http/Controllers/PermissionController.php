<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionCreateRequest;
use App\Http\Requests\PermissionEditRequest;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct(){
        $this->middleware('can:permissions.index')->only('index');
        $this->middleware('can:permissions.create')->only('create', 'store');
        $this->middleware('can:permissions.edit')->only('edit', 'update');
        $this->middleware('can:permissions.show')->only('show');
        $this->middleware('can:permissions.destroy')->only('destroy');
    }


    public function index()
    {
        abort_if(Gate::denies('permissions.index'), 403);
        $permissions = Permission::paginate(9);
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('permissions.create'), 403);
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionCreateRequest $request)
    {
        $permission = Permission::create($request->only('name'));
        return redirect()->route('permissions.index', $permission->id)->with('success', 'Permiso creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permissions.show'), 403);
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permissions.edit'), 403);
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionEditRequest $request, Permission $permission)
    {
        $permission->update($request->only('name'));
        return redirect()->route('permissions.index')->with('success','El permiso se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permissions.destroy'), 403);
        $permission->delete();
        return redirect()->route('permissions.index')->with('eliminar', 'ok');
    }
}
