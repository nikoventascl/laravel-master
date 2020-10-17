<?php

namespace App\Http\Controllers;

use App\TipoConsultas;
use App\FormulariosContactos;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use Auth;

class FormulariosContactosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Super Administrador|Administrador|Ejecutivo|Estandar');
    }
    
    public function index()
    {
        $tipoConsultas = TipoConsultas::all();        
        $formularioContactos = FormulariosContactos::with('tipoConsulta')->get();
        

        return view('formularios-contactos.index', compact('formularioContactos','tipoConsultas'));
    }

    public function create()
    {
        $tipoConsultas = TipoConsultas::where('estado','1')->get();
        return view('formularios-contactos.create',compact('tipoConsultas'));
    }

    public function store(Request $request)
    {
        try{

            $validator = Validator::make($request->all(), [
                'tipo_consultas_id' => 'required|numeric|not_in:0',
                'descripcion' => 'required|min:2|max:45|string',
                'estado' => 'required|numeric',
            ],
            [
                'tipo_consultas_id.not_in' => 'Debe seleccionar un tipo de consulta',
                'descripcion.required' => 'Debe ingresar una descripción'
            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect('formularioscontactos/create')
                ->withErrors($validator)
                ->withInput();
            }
            $formulariocontacto = formularioscontactos::create([
                'tipo_consultas_id'    => $request->tipo_consultas_id,
                'descripcion'    => $request->descripcion,
                'estado'    => $request->estado,
            ]);
            toastr()->success('Acabas de enviar tu formulario exitosamente!');
            return redirect()->route('dialogo');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('formularioscontactos/create')
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
        $tipoConsultas = TipoConsultas::where('estado','1')->get();
        $formularioContactos = FormulariosContactos::find($id);
        return view('formularios-contactos.edit', compact('formularioContactos','tipoConsultas'));
    }

    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'tipo_consultas_id' => 'required|numeric|not_in:0',
                'descripcion' => 'required|min:2|max:45|string',
                'estado' => 'required|numeric',
            ],
            [
                'tipo_consultas_id.not_in' => 'Debe seleccionar un tipo de consulta',
                'descripcion.required' => 'Debe ingresar una descripción'
            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect()->route('formularioscontactos.edit', $id)
                ->withErrors($validator)
                ->withInput();
            }
            $formularioContactos = FormulariosContactos::find($id);
            $formularioContactos->tipo_consultas_id = $request->tipo_consultas_id;
            $formularioContactos->descripcion = $request->descripcion;           
            $formularioContactos->estado = $request->estado;
            $formularioContactos->save();            
            toastr()->success('Acabas de actualizar el formulario exitosamente!');
            return redirect()->route('formularioscontactos.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('formularioscontactos/edit')
            ->withErrors($validator)
            ->withInput();
        }
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
            $formularioscontactos = FormulariosContactos::find($request->id);
            $formularioscontactos->estado = $request->estado;
            $formularioscontactos->save();        
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'formularioscontactos' => $formularioscontactos
            ]);
        }catch(Exception $e){
            return response()->json([
                'code' => 401,
                'message' => 'error',
                'data' => 'Ha ocurrido un error.'
            ]);
        }
    }  

    public function destroy($id)
    {
        //
    }
}
