<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $model;
    public function index()
    {
        $data = $this->model->all();
        return response($data, 200);
    }

    public function show ($id)
    {
        $data = $this->model->findOrFail($id);
        return response($data, 200);
    }
    public function store(Request $request)
    {
        $this->model->findOrNew($request->get('id'))->fill($request->except('id'))->save();
        return response([
            'message' => 'Dado salvo com sucesso!',
        ], 201);
    }   
}
