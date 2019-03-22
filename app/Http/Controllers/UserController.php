<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('ID', 'DESC')->paginate();
        return view('auth.index', compact('users'));
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
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',            
            'password' => 'required|string|min:6|confirmed',
        ]);
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
        
            $data = $request;
                User::create([                    
                    'name' => $data['name'],
                    'lastname' => $data['lastname'],
                    'username' => $data['username'],            
                    'email' => $data['email'],
                    'tipo' => $data['tipo'],                    
                    'password' => bcrypt($data['password']),
                ]);
        return redirect()->route('users.index')->with('message', 'Usuario agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('auth.show', compact('user'));
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
            $user->cedula = $request->cedula;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->username = $request->username;    
            $user->email = $request->email;
            $user->tipo = $request->tipo;            
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
        User::destroy($id);
        return redirect()->route('users.index')->with('message', 'Usuario eliminado exitosamente');        
    }
}