<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;

class userController extends Controller
{
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
        /*


Nether Tombs of Abaddon - PROCLAMATION
End Times - DEATH WORSHIP
Cosmic Void - Sxuperion*/
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

       $usuarios->name = $request->name;
       $usuarios->email = $request->email;
       if ($usuarios->password != null) {
       $usuarios->password = $request->password;
       }
       $usuarios->syncRoles($request->role);
       
       $usuarios->save();
       
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
        //
    }
}
