<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class administradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Super Administrador|Administrador|Ejecutivo');
    }

    public function index()
    {
        return view('administrador');
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
 function destroy($id)
    {
        //
    }
}
