<?php

namespace App\Http\Controllers;

use App\Models\Register as ModelsRegister;
use App\Models\Rubric;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Register extends Controller
{

    public function ordinamento($tipo){
        if($tipo == 1) $data=ModelsRegister::orderBy('name', 'asc')->paginate(5);
        else $data=ModelsRegister::orderBy('name', 'desc')->paginate(5);

        return response()->json($data,200);
    }

    public function filtra($tipo){
        if($tipo == 1) $data=ModelsRegister::whereMonth('created_at', Carbon::today()->month )->paginate(5);
        else $data=ModelsRegister::whereYear('created_at' , Carbon::today()->year)->paginate(5);

        return response()->json($data,200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=ModelsRegister::paginate(5);

        return response()->json($data, 200);
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
        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|max:100',
            'pIva' => 'required|max:11',
            'codiceFiscale' => 'required|max:255'
        ]);
        $data=$request->all();
        $register=new ModelsRegister();
        $register->create($data);
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=ModelsRegister::findOrFail($id);
        $rubriche=Rubric::where('register_id', $id)->get();

        return response()->json([
            'data' => $data,
            'rubriche' => $rubriche
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=ModelsRegister::findOrFail($id);

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|max:100',
            'pIva' => 'required|max:11',
            'codiceFiscale' => 'required|max:255'
        ]);
        $register=ModelsRegister::findOrFail($id);
        $data=$request->all();
        $register->update($data);
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $register=ModelsRegister::find($id);
        $register->delete();
        return response()->json([
            'message' => 'Ok'
        ], 200);
    }
}
