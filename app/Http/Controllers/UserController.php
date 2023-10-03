<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.show')->only('show');
        $this->middleware('can:users.destroy')->only('destroy');
    }
    public function index(){
        abort_if(Gate::denies('users.index'), 403);
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function create()
    {

        $roles = Role::all()->pluck('name','id');
        return view('users.create', compact('roles'));
    }

    //Crear Usuarios

    public function store(UserCreateRequest $request)
    {
        $data = $request->only('name', 'username', 'email', 'ci', 'phone', 'roles');
        $data['password'] = bcrypt($request->input('password'));

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('imagen'), $imageName);
            $data['photo'] = $imageName;
        }

        $user = User::create($data);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);

        return redirect()->route('users.index', $user->id)->with('success', 'Usuario creado correctamente!');
    }


    public function show(User $user){
        abort_if(Gate::denies('users.show'), 403);
        $user->load('roles');
        return view('users.show', compact('user'));
    }

    public function edit(User $user){
        abort_if(Gate::denies('users.edit'), 403);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UserEditRequest $request, User $user){
        $data = $request->only('name', 'username', 'email');
        $password = $request->input('password');
        if($password)
            $data['password'] = bcrypt($password);

        $user->update($data);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('users.show', $user->id)->with('success','El usuario se actualizó correctamente');
    }

    public function destroy(User $user){

        abort_if(Gate::denies('users.destroy'), 403);
        if (auth()->user()->id == $user->id){
            return redirect()->route('users.index');
        }

        $user->delete();
        return back()->with('eliminar', 'ok');
    }

    public function getUserPhone(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);

        if ($user) {
            return response()->json([ 'photo' => asset('../imagen/' . $user->photo),
                                      'ci' => $user->ci,
                                      'phone' => $user->phone,
                                   ]);
        } else {
            return response()->json(['photo' => 'Usuario no encontrado', 'ci' => 'Usuario no encontrado']);
        }
    }

}
