<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManillaCreateRequest;
use App\Models\Manilla;
use Illuminate\Http\Request;

class ManillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manillas = Manilla::paginate(9);
        return view('manillas.index', compact('manillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('manillas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManillaCreateRequest $request)
    {
         Manilla::create($request->all());

        return redirect()->route('manillas.index');
     }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Producto $producto)
    // {
    //     return view('productos.show', compact('producto'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Producto $producto)
    // {
    //     return view('productos.edit', compact('producto'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Producto $producto)
    // {
    //     $producto->update($request->all());

    //     return redirect()->route('productos.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy(Manilla $manilla)
    {
        $manilla->delete();

        return redirect()->route('manillas.index')->with('eliminar', 'ok');
    }


    public function cambio_de_estado($id)
    {
        $manilla = Manilla::findOrFail($id);
        $manilla->estado = 'CANCELADO';
        $manilla->update();
        return redirect()->back()->with('cancelado', 'VENTA CANCELADA.');
    }

}
