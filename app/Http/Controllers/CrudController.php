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

    public function update(Request $request, Crud $crud)
    {
        //
    }

    public function destroy(Crud $crud)
    {
        //
    }
}
