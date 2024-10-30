<?php

namespace App\Http\Controllers;

use App\Models\Silla;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Validator;
use Exception;

class SillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Material' => 'required',
            'Dimenciones' => 'required',
            'Peso' => 'required',
            'Uso' => 'required',
        ]);      
        
        if ($validator->fails()) 
        {
            return response()->json(["message"=>"Error al validar Registro"]);                        
        }
        
        try
        {
            $silla = new Silla();
            $silla->Material = $request->Material;
            $silla->Dimenciones = $request->Dimenciones;
            $silla->Peso = $request->Peso;
            $silla->Uso = $request->Uso;
            $silla->save();
            return response()->json(["message"=>"Registro Exitoso"]);            
        }
        catch(Exception $e)
        {
            return response()->json(["message"=>"Error al crear Registro"]);            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $Silla = Silla::all()->map(function ($Silla) {
            return $Silla->only(['id', 'Material', 'Dimenciones', 'Peso', 'Uso']);
        });
        return response()->json($Silla);
    }

   
    public function edit(Request $request, $id)
    {
      
       
        $validator = Validator::make($request->all(), [
            'Material' => 'required',
            'Dimenciones' => 'required',
            'Peso' => 'required',
            'Uso' => 'required'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Validación incorrecta']);
        }
    
        $silla = Silla::find($id);
    
        if (!$silla) {
            return response()->json(['error' => 'silla no encontrada'], 404);
        }
    
        $silla->Material = $request->Material;
        $silla->Dimenciones = $request->Dimenciones;
        $silla->Peso = $request->Peso;
        $silla->Uso = $request->Uso;
    
        $silla->save();
    
        return response()->json(['silla' => $silla, 'message' => 'Actualizado correctamente']);
          
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Silla $silla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Silla::destroy($id);
        return response()->json(["message"=>"Eliminacion Existosa"]);    
    }
}
