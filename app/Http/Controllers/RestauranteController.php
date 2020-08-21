<?php

namespace App\Http\Controllers;

use App\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request)
        {
            $query= trim($request->get('search'));

            $restaurantes = Restaurante::where('Nombre' ,'LIKE', '%'. $query . '%' )
            ->orderBy('Nombre' , 'asc')
            ->paginate(5);

            return view('restaurantes.index' ,['restaurantes' => $restaurantes]);

        }
        $datos['restaurantes']=Restaurante::paginate(5);

        return view('restaurantes.index' ,$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('restaurantes.create');
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
            'Nombre' => 'required|string|max:250',
            'Descripcion' => 'required|string|max:250',
            'Direccion' => 'required|string|max:250',
            'Ciudad' => 'required|string|max:250',
            'Foto' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $Mensaje=["required" => 'El campo es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datosRestaurante=request()->all();

        $datosRestaurante=request()->except('_token');

        if($request->hasFile('Foto'))
        {
            $datosRestaurante['Foto']=$request->file('Foto')->store('uploads' , 'public');       
        }
        Restaurante::insert($datosRestaurante);

        return redirect('restaurantes')->with('Mensaje' ,'Registro agregado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurante $restaurante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $restaurante = Restaurante::findOrFail($id);

        return view('restaurantes.edit' , compact('restaurante'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre' => 'required|string|max:250',
            'Descripcion' => 'required|string|max:250',
            'Direccion' => 'required|string|max:250',
            'Ciudad' => 'required|string|max:250',
        ];

        if($request->hasFile('Foto'))
        {
            $campos+=['Foto' => 'required|max:1000|mimes:jpeg,png,jpg'];      
        }

        $Mensaje=["required" => 'El campo es requerido'];
        
        $this->validate($request,$campos,$Mensaje);
 
        $datosRestaurante=request()->except(['_token','_method']);        

        Restaurante::where('id','=' , $id)->update($datosRestaurante);

        return redirect('restaurantes')->with('Mensaje' ,'Registro actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $restaurante = Restaurante::findOrFail($id);

        if(Storage::delete('public/' .$restaurante->Foto))
        {
            Restaurante::destroy($id);
        }
        return redirect('restaurantes')->with('Mensaje' ,'Restaurante eliminado con éxito');


    }
}
