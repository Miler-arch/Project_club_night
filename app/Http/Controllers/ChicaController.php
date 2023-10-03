<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChicaStoreRequest;
use App\Models\Chica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class ChicaController extends Controller
{
    public function index()
    {
        $chicas = Chica::paginate(5);
        return view('chicas.index', compact('chicas'));
    }
    public function create()
    {
        return view('chicas.create');
    }
    public function store(ChicaStoreRequest $request)
    {
        $validatedData = $request->validated();
        $existingUser = User::where('ci', $validatedData['ci'])->first();
        $existingPhone = User::where('phone', $validatedData['phone'])->first();
        if ($existingUser) {
            return redirect()->route('chicas.create')->withErrors(['ci' => 'El número de carnet ya está en uso.']);
         }
        if ($existingPhone) {
            return redirect()->route('chicas.create')->withErrors(['phone' => 'El número de teléfono ya está en uso.']);
        }
        $chica = $request->all();
        $health_card_expiry_date = $request->input('health_card_expiry_date');
        if($imagen = $request->file('image')){
            $rutaGuardarImg = 'imagen/';
            $imagenChica = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenChica);
            $chica['image'] = "$imagenChica";
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'ci' => $request->input('ci'),
            'phone' => $request->input('phone'),
            'username' => $chica['name'],
            'password' => bcrypt($request->input('password')),
            'photo' => $chica['image'],
        ]);

        $role = Role::findByName('chica'); // Asegúrate de que el rol exista
        $user->assignRole($role);
        Chica::create($chica);
        return redirect()->route('chicas.index', compact('health_card_expiry_date'))->with('success', 'Chica creada correctamente.');
    }
    public function show(Chica $chica )
    {
        $manillasChica = Chica::where('chicas.id', '=', $chica->id)
        ->with('manilla')
        ->get();
        $chica = $manillasChica[0];
        return view('chicas.show', compact('chica'));
    }
    public function edit(Chica $chica)
    {
        return view('chicas.edit', compact('chica'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code_card' => 'nullable|string|max:255',
            'ci' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'age' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $chica = Chica::findOrFail($id);

        $chica->name = $request->input('name');
        $chica->health_card_expiry_date = $request->input('health_card_expiry_date');
        $chica->code_card = $request->input('code_card');
        $chica->ci = $request->input('ci');
        $chica->phone = $request->input('phone');
        $chica->age = $request->input('age');

        if ($request->hasFile('image')) {
            $rutaGuardarImg = 'imagen/';
            $imagenChica = date('YmdHis') . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($rutaGuardarImg, $imagenChica);
            $chica->image = $imagenChica;
        }
        $chica->save();

        return redirect()->route('chicas.index')->with('success', 'Chica actualizada correctamente.');
    }

    public function destroy(Chica $chica)
    {
        $chica->delete();

        return redirect()->route('chicas.index')->with('eliminar', 'ok');
    }
    public function cambio_de_estado($chica, $manilla)
    {
        $chicajs= json_decode($chica);
        $manillajs= json_decode($manilla);
        $manillasChica = DB::table('manillas_chicas')
        ->where('manillas_chicas.chica_id', '=', $chicajs)
        ->where('manillas_chicas.manilla_id', '=', $manillajs)
        ->update(['cantidad' => 0, 'monto' => 0]);
        $chica = Chica::findOrFail($chica);
        $chica->estado = 'CANCELADO';
        $chica->update();
        return redirect()->back()->with('cancelado', 'VENTA CANCELADA.');
    }

    public function getUserChica(Request $request)
    {
        $chicaId = $request->input('chica_id');
        $chica = Chica::findOrFail($chicaId);
    if ($chica) {
                return response()->json([
                    'image' => asset('../imagen/' . $chica->image),
                    'ci' => $chica->ci,
                    'phone' => $chica->phone,
                    'state_chica' => $chica->state_chica,
                    'health_card_expiry_date' => $chica->health_card_expiry_date,
                    'code_card' => $chica->code_card,
                 ]);
            } else {
                return response()->json(['photo' => 'Usuario no encontrado', 'ci' => 'Usuario no encontrado']);
            }
    }


}
