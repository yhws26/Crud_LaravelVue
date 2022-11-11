<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consultar datos enviados en el formulario
        $datos['perfil']=Perfil::paginate(3);
        return view('perfil.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('perfil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'fotoPerfil'=>'required|max:10000|mimes:jpeg,png,jpg',
            'fotoLicencia'=>'required|max:10000|mimes:jpeg,png,jpg',
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Cedula'=>'required|numeric',
            'fechaNacimiento'=>'required|string|max:100',
            'numeroLicencia'=>'required|numeric',
            'fechaVencimiento'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
            'fotoPerfil.required'=>'La foto de perfil es requerida',
            'fotoLicencia.required'=>'La foto de licencia es requerida'
        ];
        //validacion de campos en el crud
        $this->validate($request, $campos,$mensaje);


        //$datosPerfil = request()->all();
        $datosPerfil = request()->except('_token');

        if($request->hasFile('fotoPerfil')){
            $datosPerfil['fotoPerfil']=$request->file('fotoPerfil')->store('uploads','public');
        }
        if($request->hasFile('fotoLicencia')){
            $datosPerfil['fotoLicencia']=$request->file('fotoLicencia')->store('uploads','public');
        }


        Perfil::insert($datosPerfil);
        //return response()->json($datosPerfil);
        return redirect('perfil')->with('mensaje','Perfil agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $perfil=Perfil::findOrFail($id);

        return view('perfil.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validaciones
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Cedula'=>'required|numeric',
            'fechaNacimiento'=>'required|string|max:100',
            'numeroLicencia'=>'required|numeric',
            'fechaVencimiento'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',
        ];

        if($request->hasFile('fotoPerfil')){
            $campos=['fotoPerfil'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['fotoPerfil.required'=>'La foto de perfil es requerida'];
        }

        if($request->hasFile('fotoLicencia')){
            $campos=['fotoLicencia'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['fotoLicencia.required'=>'La foto de licencia es requerida'];
        }

        //validacion de campos en el crud
        $this->validate($request, $campos,$mensaje);


        $datosPerfil = request()->except('_token','_method');

        if($request->hasFile('fotoPerfil')){
            $perfil=Perfil::findOrFail($id);

            Storage::delete('public/'.$perfil->fotoPerfil);

            $datosPerfil['fotoPerfil']=$request->file('fotoPerfil')->store('uploads','public');
        }
        
        if($request->hasFile('fotoLicencia')){
            $datosPerfil['fotoLicencia']=$request->file('fotoLicencia')->store('uploads','public');
        }

        Perfil::where('id','=',$id)->update($datosPerfil);

        $perfil=Perfil::findOrFail($id);
        //return view('perfil.edit', compact('perfil'));

        return redirect('perfil')->with('mensaje','Perfil Modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $perfil=Perfil::findOrFail($id);

        if(Storage::delete('public/'.$perfil->fotoPerfil)){

            Perfil::destroy($id);

        }

        return redirect('perfil')->with('mensaje','Perfil Borrado');
    }
}
