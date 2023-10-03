<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $clients = Client::latest()->paginate(50);
        return view('clients.index', compact('clients'));
    }
    public function create()
    {
        return view('clients.create');
    }
    public function store(Request $request)
    {
        $client = Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'user_id' => auth()->user()->id,
            'description' => $request->description,
            'amount' => $request->amount,
        ]);
        return redirect()->route('clients.index', $client->id)
            ->with('info', 'Cliente guardado con éxito');
    }
    public function show($id)
    {
        $client = Client::find($id);
        return view('clients.show', compact('client'));

    }
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));
    }
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->update($request->all());
        return redirect()->route('clients.index', $client->id)
            ->with('info', 'Cliente actualizado con éxito');
    }
    public function destroy($id)
    {
        $client = Client::find($id)->delete();
        return back()->with('info', 'Eliminado correctamente');
    }
}
