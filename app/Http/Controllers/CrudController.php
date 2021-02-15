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

    public function edit($crud)
    {
        return response()->json(Crud::where('id', $crud)->first());
    }

    public function update(Request $request, Crud $crud)
    {
        $this->validate($request,
            [
                'title' => 'required|unique:cruds,title,' . $crud->id
            ]);
        $crud->update(['title'=> $request->get('title')]);
        return response()->json('update');
    }

    public function destroy(Crud $crud)
    {
        //
    }

    public function change(Request $request, $id)
    {
        Crud::where('id', $id)->update(['status'=> $request->get('status')]);
        return response()->json($request);
    }

    public function completed(Request $request)
    {
        return response()->json(Crud::where('status', 1)->get());
    }

    public function active(Request $request)
    {
        return response()->json(Crud::where('status', 0)->get());
    }
}
