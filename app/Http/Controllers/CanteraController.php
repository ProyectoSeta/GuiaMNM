<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Models\User;
use App\Models\Cantera;
use App\Models\Produccion;
use Illuminate\Http\Request;
use DB;

class CanteraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canteras = Cantera::all();
        $user = auth()->id();

        $sujeto = DB::table('sujeto_pasivo')
                    ->select('id_sujeto')
                    ->where('id_user',$user);

        $cantera = DB::table('canteras')
                    ->where('id_sujeto',$sujeto);

        return view('cantera', compact('canteras'));

    }

    public function getCanteras()
    {
        // $user = auth()->id();
        // $sujeto = DB::table('sujeto_pasivo')
        //             ->select('id_sujeto')
        //             ->where('id_user',$user);


        // $canteras = DB::table('canteras')
        //             ->where('id_sujeto',$sujeto);
        
        // return view('cantera', compact('canteras', $canteras));
        
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
    public function store(Request $request){
        $user = auth()->id();

        $sujeto = DB::table('sujeto_pasivo')
                    ->select('id_sujeto')
                    ->where('id_user',$user);


        $cantera = Cantera::create([
            'id_sujeto'=> $sujeto,
            'direccion'=>$request->post('direccion'),
            'nombre'=>$request->post('nombre')
        ]);

        if($cantera->save()){ // insercion en la tabla cantera creando el usuario
            $identificador = $cantera->id; // Aca se Obtiene el ID del usuario creado
            $minerales = $request->post('produccion');

            foreach ($minerales as $mineral) {
                $produccion = new Produccion(); // SE llama al modelo sujetopasivo
                $produccion = Produccion::create([
                    'id_cantera'=>$identificador,
                    'mineral' => $mineral
                ]);
                $produccion->save();
            }

            // if ($produccion->save()) { //insercion en la tabla produccion
            //     // return redirect()->route("cantera"); // Redirecciona a el controlador que se necesite
            // }

        }
                

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
