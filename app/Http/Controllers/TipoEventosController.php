<?php

namespace App\Http\Controllers;

use App\TipoEventos;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use Auth;


class TipoEventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Super Administrador|Administrador|Ejecutivo');
    }

    //Listar (get)
    public function index()
    {
        $tipoEventos = TipoEventos::all();
        return view('tipo-eventos.index', compact('tipoEventos'));
    }
    //Retorna una vista (get)
    public function create()
    {
        return view('tipo-eventos.create');
    }
    //Insertar en la base de datos (post)
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
                return redirect('tipoEventos/create')
                            ->withErrors($validator)
                            ->withInput();
            }            
            $tipoEvento = tipoEventos::create([
                'nombre'    => $request->nombre,
                'estado'    => $request->estado,
            ]);
            toastr()->success('Acabas de crear el tipo de evento "'.strtoupper($request->nombre).'" exitosamente!'); 
            return redirect()->route('tipoEventos.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('tipoEventos/create')
                            ->withErrors($validator)
                            ->withInput();
        }
    }
    //Retorna una vista (get)
    public function show($id)
    {
        //
    }
    //Retorna una vista (get)
    public function edit($id)
    {
        $tipoEvento = TipoEventos::find($id);
        return view('tipo-eventos.edit', compact('tipoEvento'));
    }
    //Actualizar en la base de datos (put)
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
                return redirect()->route('tipoEventos.edit', $id)
                            ->withErrors($validator)
                            ->withInput();
            }
            $tipoEvento = TipoEventos::find($id);
            $tipoEvento->nombre = $request->nombre;
            $tipoEvento->estado = $request->estado;
            $tipoEvento->save();
            toastr()->success('Acabas de actualizar el tipo de evento "'.strtoupper($request->nombre).'" exitosamente!');            
            return redirect()->route('tipoEventos.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('tipoEventos/edit')
                            ->withErrors($validator)
                            ->withInput();
        }
    }
    //No lo usamos
    public function destroy($id)
    {
        //
    }
    //Actualiza estado (post) es una ruta manual
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
            $tipoEvento = TipoEventos::find($request->id);
            $estado = $tipoEvento->estado == 1 ? 2 : 1;
            $tipoEvento->estado = $estado;
            $tipoEvento->save();        
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'tipoEvento' => $tipoEvento
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
