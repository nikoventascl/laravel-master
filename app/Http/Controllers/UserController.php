<?php

namespace App\Http\Controllers;

use App\Viviendas;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use Hash;
use carbon\Carbon;
use Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Super Administrador|Administrador|Ejecutivo');
    }

    public function index()
    {
        $viviendas = Viviendas::all();
        $usuarios = User::with('viviendas')->get();
        return view('usuarios.index', compact('usuarios','viviendas'));
    }

    public function create()
    {   
        $viviendas = Viviendas::where('estado','1')->get();
        return view('usuarios.create',compact('viviendas'));
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2|max:30|string',
                'apellido' => 'required|min:2|max:30|string',
                'email' => 'required|min:2|max:50|string|unique:users',
                'password' => 'required|min:2|max:30|string|',
                'telefono' => 'required|integer',
                'fecha_nacimiento' => 'required|date',
                'vivienda_id' => 'required|numeric|not_in:0',
                'rol' => 'required|numeric|not_in:0',
                'estado' => 'required|numeric',
                'rut' => [  'required',
                            'string',
                            'max:20',
                            'unique:users',
                            function ($attribute, $value, $fail) {
                                $validarRut = $this->valida_rut($value);
                                if(!$validarRut){
                                    $fail('Ingrese un rut válido.');
                                }
                            },
                        ]
            ],
            [
                'name.required' => 'Debe ingresar un nombre',
                'apellido.required' => 'Debe ingresar un apellido',
                'rut.required' => 'Debe ingresar un RUT',
                'rut.unique' => 'El rut ingresado ya esta registrado',
                'email.required' => 'Debe ingresar un email',
                'email.unique' => 'El email ingresado ya esta registrado',
                'password.required' => 'Debe ingresar una contraseña',
                'telefono.required' => 'Debe ingresar un telefono de contacto',
                'telefono.integer' => 'Debe ingresar un numero valido ej: 56953320487',
                'fecha_nacimiento.required' => 'Debe ingresar una fecha de nacimiento',
                'vivienda_id.not_in' => 'Debe seleccionar una vivienda',
                'rol.not_in' => 'Debe asignar un rol',
            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect('usuarios/create')
                            ->withErrors($validator)
                            ->withInput();
            }            
            $usuarios = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'apellido'  => $request->apellido,
                'telefono'=> $request->telefono,
                'rut'   => $request->rut,
                'fecha_nacimiento' => Carbon::parse($request->fecha_nacimiento)->format('Y-m-d'), 
                'vivienda_id' => $request->vivienda_id,
                'estado' => $request->estado,
            ]);
            $usuarios->assignRole([$request->rol]);
            toastr()->success('Acabas de crear un usuario "'.strtoupper($request->name).'" exitosamente!');
            return redirect()->route('usuarios.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('usuarios/create')
            ->withErrors($validator)
            ->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $viviendas = Viviendas::where('estado','1')->get();
        $usuarios = User::find($id);
        return view('usuarios.edit', compact('usuarios','viviendas'));
    }

    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:2|max:30|string',
                'apellido' => 'required|min:2|max:30|string',
                'email' => [
                                'required',
                                'min:2',
                                'max:50',
                                'string',
                                Rule::unique('users')->ignore($id),
                            ],
                'telefono' => 'required|integer',
                'fecha_nacimiento' => 'required|date',
                'vivienda_id' => 'required|numeric|not_in:0',
                'rol' => 'required|numeric|not_in:0',
                'estado' => 'required|numeric',
                'rut' =>[   'required',
                            'string',
                            'max:20',
                            Rule::unique('users')->ignore($id),
                            function ($attribute, $value, $fail){
                                $validarRut = $this->valida_rut($value);
                                if(!$validarRut){
                                    $fail('Ingrese un rut valido.');
                                }
                            },
                        ]
            ],
            [
                'name.required' => 'Debe ingresar un nombre',
                'apellido.required' => 'Debe ingresar un apellido',
                'rut.required' => 'Debe ingresar un RUT',
                'rut.unique' => 'El rut ingresado ya a sido registrado',
                'email.required' => 'Debe ingresar un email',
                'email.unique' => 'El email ingresado ya esta registrado',
                'telefono.required' => 'Debe ingresar un telefono de contacto',
                'telefono.integer' => 'Debe ingresar un numero valido ej: 56953320487',
                'username.required' => 'Debe ingresar un nombre de usuario',
                'fecha_nacimiento.required' => 'Debe ingresar una fecha de nacimiento',
                'vivienda_id.not_in' => 'Debe seleccionar una vivienda',
                'rol.not_in' => 'Debe asignar un rol',
            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect()->route('usuarios.edit', $id)
                            ->withErrors($validator)
                            ->withInput();
            }
            $usuarios = User::find($id);
            $usuarios->name = $request->name;
            $usuarios->email = $request->email;
            $usuarios->password = $request->password;
            $usuarios->apellido = $request->apellido;
            $usuarios->username = $request->username;
            $usuarios->telefono = $request->telefono;
            $usuarios->rut = $request->rut;
            $usuarios->fecha_nacimiento = Carbon::parse($request->fecha_nacimiento)->format('Y-m-d');      
            $usuarios->vivienda_id = $request->vivienda_id;
            $usuarios->roles()->sync([$request->rol]);
            $usuarios->estado = $request->estado;
            $usuarios->save();            
            toastr()->success('Acabas de actualizar un usuario "'.strtoupper($request->name).'" exitosamente!');
            return redirect()->route('usuarios.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('usuarios/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
    }

    public function destroy($id)
    {
        //
    }

    public function cambiarEstado(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'id' => 'required|numeric',
                'estado' => 'required|string',
            ]);
            if($validator->fails()){
                return response()->json([
                    'code' => 400,
                    'message' => 'error',
                    'data' => $validator->messages()
                ]);
            }
            $usuarios = User::find($request->id);
            $usuarios->estado = $request->estado;
            $usuarios->save();
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'usuarios' => $usuarios
            ]);
        }catch(Exception $e){
            return response()->json([
                'code' => 401,
                'message' => 'error',
                'data' => 'Ha ocurrido un error.'
            ]);
        } 
    } 

    public function valida_rut($rut)
    {
        try{
            $rut = preg_replace('/[^k0-9]/i', '', $rut);
            $dv  = substr($rut, -1);
            $numero = substr($rut, 0, strlen($rut)-1);
            $i = 2;
            $suma = 0;
            foreach(array_reverse(str_split($numero)) as $v)
            {
                if($i==8)
                    $i = 2;

                $suma += $v * $i;
                ++$i;
            }
            $dvr = 11 - ($suma % 11);
            
            if($dvr == 11)
                $dvr = 0;
            if($dvr == 10)
                $dvr = 'K';
            if($dvr == strtoupper($dv))
                return true;
            else
                return false;
        }catch(Exception $e){
            return false;
        }
    } 
}
