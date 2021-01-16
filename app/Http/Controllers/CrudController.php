<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        return response()->json(Crud::get());
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request,
        [
            'title' => 'required'
        ]);
        Crud::create($request->all());
       return response()->json('saved');
    }

    public function show(Crud $crud)
    {
        //
    }

    public function edit(Crud $crud)
    {
        //
    }

    public function update(Request $request, $crud)
    {
        //return response()->json($request);
        Crud::where('id', $crud)->update(['status'=> $request->get('status')]);
        return response()->json($request);
    }

    public function destroy(Crud $crud)
    {
        //
    }

    public function change()
    {
        return response()->json('change');
    }
}
