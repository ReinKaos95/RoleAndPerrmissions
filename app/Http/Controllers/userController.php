<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
class userController extends Controller
{

  //constructor proteccion de controlador

  public function __construct()
  {
        $this->middleware(['permission:create user'],['only' =>['create', 'store']]);
         $this->middleware(['permission:read users'],['only' =>['index']]);
          $this->middleware(['permission:update user'],['only' =>['edit', 'update']]);
           $this->middleware(['permission:delete user'],['only' =>['delete']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users=User::all();
      return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all()->pluck('name', 'id');

      return view('usuarios.create',  compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $usuarios = new User;
       $usuarios->name = $request->name;
       $usuarios->email = $request->email;
       $usuarios->password = bcrypt($request->password);
       if ($usuarios->save()) {
       $usuarios->assignRole($request->role);
       return redirect('/usuarios');
       } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users=User::findOrFail($id);

        //obtencion de roles
        $roles=Role::all()->pluck('name', 'id');

      return view('usuarios.edit', compact('users','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $users=User::findOrFail($id);

       $users->name = $request->name;
       $users->email = $request->email;
       if ($users->password != null) {
       $users->password = $request->password;
       }
       $users->syncRoles($request->role);
       
       $users->save();
       
       return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $users=User::findOrFail($id);
       #eliminar role
       $users->removeRole($users->roles->implode('name', ','));

       #eliminar usuario
        if ($users->delete()) {
       return redirect('/usuarios');
   }
       else{
        return response()->json([
            'mensaje'=>'error al eliminar usuario'
        ]);
       }
    }
}
