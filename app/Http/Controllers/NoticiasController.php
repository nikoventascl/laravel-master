<?php

namespace App\Http\Controllers;

use App\Noticias;
use App\User;
use App\Imagenes;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use Auth;

class NoticiasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Super Administrador|Administrador|Ejecutivo|Estandar');
    }

    public function index()
    {
        $users = User::all();
        $noticias = Noticias::all();
        return view('noticias.index', compact('noticias','users'));
    }

    public function create()
    {
        return view('noticias.create');
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'titulo' => 'required|min:2|max:50|string',
                'descripcion_corta' => 'required|min:2|max:100|string',
                'descripcion_larga' => 'required|min:2|max:10000|string',
                'estado' => 'required|numeric',
            ],
            [
                'titulo.required' => 'Debe ingresar un titulo',
                'descripcion_corta.required' => 'Debe ingresar una descripcion corta',
                'descripcion_larga.required' => 'Debe ingresar una descripcion larga',
            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect('noticias/create')
                ->withErrors($validator)
                ->withInput();
            }
            $noticias = noticias::create([
                'titulo'    => $request->titulo,
                'descripcion_corta'    => $request->descripcion_corta,
                'descripcion_larga'    => $request->descripcion_larga,
                'estado'    => $request->estado,
                'user_created_id'    => Auth::user()->id,
                'user_updated_id'    => 0,
            ]);

            //RECORRER EL LISTADO DE IMÁGENES QUE VIENEN DEL FRONT



            /*
            if ($request->hasFile('imagen')) {
                $file = $request->file('imagen');
                $name = time().$file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension(); 
                $file->move(storage_path().'/imagenes/noticias/temp/',$name);
                
                $imagenes = imagenes::create([
                    'nombre'    => $name,
                    'tipo'    => 'noticia',
                    'extension'    => '.'.$ext,
                    'portada'    => 'no',
                    'estado'    => 1,
                    'relacion_id'    => 1,
                ]);
            }
            */
            toastr()->success('Acabas de crear una noticia "'.strtoupper($request->titulo).'" exitosamente!');
            return redirect()->route('noticias.index');
        }catch(Exception $e){
            dd($e->getMessage());
            toastr()->error('Ha ocurrido un error.');
            return redirect('noticias/create')
            ->withErrors($validator)
            ->withInput();
        }
    }

    public function show($id)
    {
        $users = User::all();
        $noticias = Noticias::find($id);
        return view('noticias.show', compact('noticias','users'));
    }

    public function edit($id)
    {
        $noticias = Noticias::find($id);
        return view('noticias.edit', compact('noticias'));
    }

    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'titulo' => 'required|min:2|max:50|string',
                'descripcion_corta' => 'required|min:2|max:100|string',
                'descripcion_larga' => 'required|min:2|max:10000|string',
                'estado' => 'required|numeric',
            ],
            [
                'titulo.required' => 'Debe ingresar un titulo',
                'descripcion_corta.required' => 'Debe ingresar una descripcion corta',
                'descripcion_larga.required' => 'Debe ingresar una descripcion larga',
            ]);
            if($validator->fails()){
                toastr()->error('Existen campos con problemas. Favor verifica que todos los campos obligatorios estén con información.');
                return redirect()->route('noticias.edit', $id)
                ->withErrors($validator)
                ->withInput();
            }
            $noticias = Noticias::find($id);
            $noticias->titulo = $request->titulo;
            $noticias->descripcion_corta = $request->descripcion_corta;
            $noticias->descripcion_larga = $request->descripcion_larga;
            $noticias->estado = $request->estado;
            $noticias->user_updated_id = Auth::user()->id;
            $noticias->save();
            toastr()->success('Acabas de actualizar una noticia "'.strtoupper($request->titulo).'" exitosamente!');            
            return redirect()->route('noticias.index');
        }catch(Exception $e){
            toastr()->error('Ha ocurrido un error.');
            return redirect('noticias/edit')
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
            $noticias = Noticias::find($request->id);
            $estado = $noticias->estado == 1 ? 2 : 1;
            $noticias->estado = $estado;
            $noticias->save();        
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'noticias' => $noticias
            ]);
        }catch(Exception $e){
            return response()->json([
                'code' => 401,
                'message' => 'error',
                'data' => 'Ha ocurrido un error.'
            ]);
        }
    }  
    
    public function mostrar()
    {
        $noticias = Noticias::orderBy('id', 'desc')->paginate(5);
        return view('noticias.mostrar', compact('noticias'));
    }

}
