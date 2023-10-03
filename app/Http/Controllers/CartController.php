<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function shop()
    {
        
        $productos = Producto::all();
        return view('shop')->with(['productos' => $productos]);
    }

    public function cart()
    {
        $cartCollection = Cart::getContent();
        $ventas = Venta::all();
        //dd($cartCollection);
        $users = User::all();
        return view('ventas.cart')->with(['cartCollection' => $cartCollection, 'users' => $users, 'ventas' => $ventas]);
    }

    public function remove(Request $request)
    {

        Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'El producto ha sido eliminado de la venta.');
    }

    public function add(Request $request)
    {
        Cart::add(array(
            'id' => $request->id,
            'name' => $request->nombre,
            'price' => $request->precio,
            'quantity' => $request->quantity,
            'attributes' => array(
                'imagen' => $request->imagen,
                'slug' => $request->slug
            )
        ));
        
        return redirect()->route('cart.index')->with('success_msg', 'Producto Agregado exitosamente.');
    }

    public function update(Request $request)
    {   
        Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            )
        );
        return redirect()->route('cart.index')->with('success_msg', 'La venta ha sido guardada con exito!',);
    }

    public function clear()
    {
        Cart::clear();

        return redirect()->route('cart.index')->with('success_msg', 'La venta ha sido eliminada!');
    }

    public function save(Request $request)
    {
        Cart::clear();
        $venta = $request->all();
        Venta::create($venta);
        return redirect()->route('ventas.index');
    }

}
