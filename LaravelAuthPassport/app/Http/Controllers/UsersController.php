<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use Auth;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::orderBy('id', 'ASC')->paginate();
        return view('users.index', compact('users'));
    }
    
      public function getdata()
    {
        $users = User::all();
        return DataTables::of($users)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
        'nombre'              => 'required',
        'correo'     => 'required',
                  
            
        ],
                          
        [   
            'nombre.required'    => 'El campo nombre es obligatorio.',
            'correo.max'      => 'El campo correo es obligatorio.'
        ]);
        
        $user = new User;

        $user->name      = $request->nombre;
        $user->email     = $request->correo;
        $user->password  = Hash::make($request->correo);
        
        $user->save();

        return redirect()->route('users.index')
                         ->with('info', ' El usuario '.$user->name.' fue creado exitosamente!');
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
        $users = User::find($id);
        return view('users.edit', compact('users'));
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
          $request->validate([
            
          'nombre'              => 'required',
          'correo'     => 'required',
                  
            
         ],
        [   
            'nombre.required'    => 'El campo nombre es obligatorio.',
            'correo.max'      => 'El campo correo es obligatorio.'
        ]);
        
        $user = User::find($id);

        $user->name      = $request->nombre;
        $user->email     = $request->correo;
        $user->password  = Hash::make($request->correo);
       /* $user->role      = $request->role;
        $user->status    = $request->status;*/

        $user->save();
        return redirect()->route('users.index')
                         ->with('info', ' El usuario '.$user->name.' fue modificado correctamente!');
    }
    
        public function showProfile($id)
    {
        $user = User::find($id);

        return view('users.profile', compact('user'));
    }

     public function UpdateProfile(Request $request, $id)
    {
         
        $request->validate([
            
        'name'              => 'required',
        'email'     => 'required',
        'new_password' => 'required'
                  
            
        ],
        [   
            'name.required'    => 'El campo nombre es obligatorio.',
            'email.max'      => 'El campo correo es obligatorio.',
            'new_password.required' => 'El campo nueva contraseña es obligatorio.'
        ]);
         
        $user = User::find($id);

        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->password  = Hash::make($request->new_password);
           
        
        //$user->email     = $request->email;
        // $user->password  = Hash::make($request->password);
       /* $user->role      = $request->role;
        $user->status    = $request->status;*/

        $user->save();
        return redirect()->route('users.index')
                         ->with('info', ' El usuario '.$user->name.' fue editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::find($id);
        $user->delete();

        return back()->with('info', ' El usuario '.$user->name.' fue eliminado correctamente!');
    }
}
