<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private CategoryService $service;

    public function __construct()
    {
        $this->service = new CategoryService();
    }
    
   
    public function index()
    {
        $response = $this->service->index();

        return response()->json($response->data, $response->code);
    }

    
    public function store(CategoryRequest $request)
    {
        $response = $this->service->store($request);

        return response()->json($response->data, $response->code);
    }

  
    public function show(string $id)
    {
        $response = $this->service->show($id);

        return response()->json($response->data, $response->code);
    }

   
    public function update(CategoryRequest $request, string $id)
    {
        $response = $this->service->update($request, $id);

        return response()->json($response->data, $response->code);
    }

    
    public function destroy(string $id)
    {
        $response = $this->service->destroy($id);

        return response()->json($response->data, $response->code);
    }
}
