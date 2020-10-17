<?php

namespace App\Http\Controllers;

use App\TipoConsultas;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use Auth;

class TipoConsultasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Super Administrador|Administrador|Ejecutivo');
    }
    
    public function index()
    {
        $tipoConsultas = TipoConsultas::all();
        return view('tipo-consultas.index', compact('tipoConsultas'));
    }

    
    public function create()
    {
        return view('tipo-consultas.create');
    }


    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|min:2|max:45|string',
                'estado' => 'required|numeric',
            ],
            [
                'nombre.required' => 'Debe ingresar un nombre',
            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect('tipoConsultas/create')
                            ->withErrors($validator)
                            ->withInput();
            }            
            $tipoConsulta = tipoConsultas::create([
                'nombre'    => $request->nombre,
                'estado'    => $request->estado,
            ]);
            toastr()->success('Acabas de crear el tipo de consulta "'.strtoupper($request->nombre).'" exitosamente!');
            return redirect()->route('tipoConsultas.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('tipoConsultas/create')
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
        $tipoConsulta = TipoConsultas::find($id);
        return view('tipo-consultas.edit', compact('tipoConsulta'));
    }

    
    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|min:2|max:45|string',
                'estado' => 'required|numeric',
            ],
            [
                'nombre.required' => 'Debe ingresar un nombre',
            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect()->route('tipoConsultas.edit', $id)
                            ->withErrors($validator)
                            ->withInput();
            }
            $tipoConsulta = TipoConsultas::find($id);
            $tipoConsulta->nombre = $request->nombre;
            $tipoConsulta->estado = $request->estado;
            $tipoConsulta->save();            
            toastr()->success('Acabas de actualizar el tipo de consulta "'.strtoupper($request->nombre).'" exitosamente!');
            return redirect()->route('tipoConsultas.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('tipoConsultas/edit')
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
            $tipoConsulta = TipoConsultas::find($request->id);
            $estado = $tipoConsulta->estado == 1 ? 2 : 1;
            $tipoConsulta->estado = $estado;
            $tipoConsulta->save();        
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'tipoConsulta' => $tipoConsulta
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
