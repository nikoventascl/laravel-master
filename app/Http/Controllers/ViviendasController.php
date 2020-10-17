<?php

namespace App\Http\Controllers;

use App\Viviendas;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use Auth;

class ViviendasController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Super Administrador|Administrador|Ejecutivo');
    }

    public function index()
    {
        $viviendas = Viviendas::all();
        return view('viviendas.index', compact('viviendas'));
    }


    public function create()
    {
        return view('viviendas.create');
    }


    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'direccion' => 'required|min:2|max:45|string',
                'jefe_hogar' => 'required|min:2|max:45|string',
                'cantidad_habitantes' => 'required|min:1|max:99|integer',
                'estado' => 'required|numeric',
            ],
            [
                'direccion.required' => 'Debe ingresar una direccion',
                'jefe_hogar.required' => 'Debe ingresar un jefe de hogar',
                'cantidad_habitantes.required' => 'Debe ingresar la cantidad de habitantes',
                'cantidad_habitantes.integer' => 'Solo debe ingresar numeros',
            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect('viviendas/create')
                            ->withErrors($validator)
                            ->withInput();
            }            
            $viviendas = viviendas::create([
                'direccion'    => $request->direccion,
                'jefe_hogar'    => $request->jefe_hogar,
                'cantidad_habitantes'    => $request->cantidad_habitantes,
                'estado'    => $request->estado,
            ]);
            toastr()->success('Acabas de crear una vivienda "'.strtoupper($request->direccion).'" exitosamente!');
            return redirect()->route('viviendas.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('viviendas/create')
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
        $viviendas = Viviendas::find($id);
        return view('viviendas.edit', compact('viviendas'));
    }

 
    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'direccion' => 'required|min:2|max:45|string',
                'jefe_hogar' => 'required|min:2|max:45|string',
                'cantidad_habitantes' => 'required|min:1|max:99|integer',
                'estado' => 'required|numeric',
            ],
            [
                'direccion.required' => 'Debe ingresar una direccion',
                'jefe_hogar.required' => 'Debe ingresar un jefe de hogar',
                'cantidad_habitantes.required' => 'Debe ingresar la cantidad de habitantes',
                'cantidad_habitantes.integer' => 'Solo debe ingresar numeros',

            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect()->route('viviendas.edit', $id)
                            ->withErrors($validator)
                            ->withInput();
            }
            $viviendas = Viviendas::find($id);
            $viviendas->direccion = $request->direccion;
            $viviendas->jefe_hogar = $request->jefe_hogar;
            $viviendas->cantidad_habitantes = $request->cantidad_habitantes;
            $viviendas->estado = $request->estado;
            $viviendas->save();            
            toastr()->success('Acabas de actualizar una vivienda "'.strtoupper($request->direccion).'" exitosamente!');
            return redirect()->route('viviendas.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('viviendas/edit')
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
            ]);
            if($validator->fails()){
                return response()->json([
                    'code' => 400,
                    'message' => 'error',
                    'data' => $validator->messages()
                ]);
            }
            $viviendas = Viviendas::find($request->id);
            $estado = $viviendas->estado == 1 ? 2 : 1;
            $viviendas->estado = $estado;
            $viviendas->save();        
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'viviendas' => $viviendas
            ]);
        }catch(Exception $e){
            return response()->json([
                'code' => 401,
                'message' => 'error',
                'data' => 'Ha ocurrido un error.'
            ]);
        }
    }    
}
