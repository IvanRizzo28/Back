<?php

namespace App\Http\Controllers;

use App\Models\Conctact as ModelsConctact;
use Illuminate\Http\Request;

class Conctact extends Controller
{

    public function get($rubric_id){
        $conctact=ModelsConctact::where('rubric_id', $rubric_id)->get();

        return response()->json($conctact, 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'telephone' => 'required|max:10',
            'code' => 'required',
            'rubric_id' => 'required|exists:rubrics,id'
        ]);
        $conctact=new ModelsConctact();
        $data=$request->all();
        $newData=$conctact->create($data);
        return response()->json($newData, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=ModelsConctact::findOrFail($id);

        return response()->json($data, 200);
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
        $request->validate([
            'name' => 'required|string|max:50',
            'telephone' => 'required|max:10',
            'code' => 'required',
            'rubric_id' => 'required|exists:rubrics,id'
        ]);
        $conctact=ModelsConctact::findOrFail($id);
        $data=$request->all();
        $conctact->update($data);
        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $conctact=ModelsConctact::find($id);
        $conctact->delete();
        return response()->json([
            'message' => 'Ok'
        ], 200);
    }
}
