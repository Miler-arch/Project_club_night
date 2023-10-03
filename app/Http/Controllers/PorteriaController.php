<?php

namespace App\Http\Controllers;

use App\Models\Chica;
use App\Models\Client;
use App\Models\Porteria;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class PorteriaController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $chicas = Chica::all();
        $users = User::all();
        $rol = Role::all();
        return view('porterias.index', compact('users', 'chicas', 'clients', 'rol'));
    }

    public function create()
    {
        $clients = Client::all();
        $chicas = Chica::all();
        $users = User::all();
        return view('porterias.create', compact('clients', 'chicas', 'users'));
    }

    public function store(Request $request)
    {
        auth()->user()->porterias()->create([
            'income' => $request->input('income'),
            'exit' => $request->input('exit'),
            'type_exit' => $request->input('type_exit'),
            'reason' => $request->input('reason'),
            'return_time' => $request->input('return_time'),
            'note' => $request->input('note'),
            'reason_txt' => $request->input('reason_txt'),
            'chica_id' => $request->input('chica_id'),
            'client_id' => $request->input('client_id'),
        ]);
        return redirect()->route('porterias.registros');
    }

    public function verRegistros()
    {
        $porterias = Porteria::all();
        $porterias = Porteria::paginate(50);
        $clients = Client::all();
        $chicas = Chica::all();
        $users = User::all();
        return view('porterias.registros', compact('porterias', 'clients', 'chicas', 'users'));
    }

    public function edit($id)
    {
        $porterias = Porteria::find($id);
        return view('porterias.edit', compact('porterias'));
    }

    public function update(Request $request, $id)
    {
        $porterias = Porteria::find($id)->update($request->all());
        return redirect()->route('porterias.index', $porterias);
    }

    public function destroy($id)
    {
        $porterias = Porteria::find($id)->delete();
        return redirect()->route('porterias.index', $porterias);
    }
}
