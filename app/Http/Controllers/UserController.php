<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Bitacora;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipo == '1')
        {
            $users = User::orderBy('ID', 'DESC')->paginate();
            $valor = "Usuario";       
        }
        elseif(Auth::user()->tipo == '2' or Auth::user()->tipo == '3')
        {            
            $users = User::where('cedula', '=', Auth::user()->cedula)->get();
            $valor = "Datos personales";       
        }
        else
        {
            return view('auth.error', compact('users'));
        }
        return view('auth.index', compact('users', 'valor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('auth.create');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [  
            'tipo_cedula' => 'required|string|max:2',          
            'cedula' => 'required|string|max:15|unique:users',          
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'sexo' => 'required|string|max:2',          
            'avatar' => 'file|max:1024',
            'email' => 'required|string|email|max:255|unique:users',            
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    public function uploadFilePost(Request $request){        

        $fileName = $request['cedula'].'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatar', $fileName);

        return $fileName;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validator($request->all())->validate();
        $file="NULL";

        if($request->hasFile('avatar')) 
            {
                $file = $this->uploadFilePost($request);                
            }
        
            $data = $request;
            $user_id = Auth::user()->id;
            $accion = 'Crea usuario';
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
                User::create([
                    'tipo_cedula' => $data['tipo_cedula'],
                    'cedula' => $data['cedula'],                
                    'name' => $data['name'],
                    'lastname' => $data['lastname'],
                    'username' => $data['username'],            
                    'email' => $data['email'],
                    'sexo' => $data['sexo'],
                    'tipo' => $data['tipo'], 
                    'avatar' => $file,       
                    'tel_movil' => $data['tel_movil'],              
                    'tel_local' => $data['tel_local'],              
                    'direccion' => $data['direccion'],              
                    'password' => bcrypt($data['password']),
                ]);
        return redirect()->route('users.index')->with('message', 'Usuario agregado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('auth.edit', compact('user'));   
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
        $user = User::find($id);               

        if($user)
        {            
            $accion = 'Edita usuario : id = '.$id;
            $user_id = Auth::user()->id;
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
            $user->tipo_cedula = $request->tipo_cedula;
            $user->cedula = $request->cedula;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->username = $request->username;    
            $user->email = $request->email;
            $user->sexo = $request->sexo;
            $user->tipo = $request->tipo;
            $user->tel_movil = $request->tel_movil;
            $user->tel_local = $request->tel_local;
            $user->direccion = $request->direccion;
            if($request->hasFile('avatar')) 
            {
                $file = $this->uploadFilePost($request);
                $user->avatar = $file;
            }            
            
            if($request->password) 
                { 
                    Validator::make($request->all(), [
                        'password' => 'required|string|min:6|confirmed',
                    ])->validate();
                    $user->password = bcrypt($request->password);   
                }
            $user->save();         
        }
        return redirect()->route('users.index')->with('message', 'Usuario editado exitosamente');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::user()->id;
        $accion = 'Elimina usuario : id = '.$id;
                Bitacora::create([
                    'accion' => $accion,
                    'user_id' => $user_id,            
                ]);
        User::destroy($id);
        return redirect()->route('users.index')->with('message', 'Usuario eliminado exitosamente');        
    }
}
