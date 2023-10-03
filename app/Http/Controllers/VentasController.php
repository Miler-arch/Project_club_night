<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaCreateRequest;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class VentasController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       
        $ventas = Venta::paginate(5);
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $users = User::all();
        $productos = Producto::where('estado','HABILITADO')->get();
        return view('ventas.shop')->with(['productos' => $productos, 'users' => $users ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VentaCreateRequest $request)
    {
        Venta::create($request->all());
        return redirect()->route('ventas.index');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        return view('ventas.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $venta->update($request->all());

        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        // $venta->delete();

        // return redirect()->route('ventas.index')->with('eliminar', 'ok');
    }

    public function cambio_de_estado($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->estado = 'CANCELADO';
        $venta->update();
        return redirect()->back()->with('cancelado', 'VENTA CANCELADA.');
    }

}

