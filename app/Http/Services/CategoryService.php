<?php

namespace App\Http\Services;

use App\Classes\BaseServiceResponse;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryService extends BaseService
{


    public function index() : BaseServiceResponse
    {
        $categories = Category::all();
        
        return $this->success(CategoryResource::collection($categories), JsonResponse::HTTP_OK);

    }

    
    public function store(CategoryRequest $request) : BaseServiceResponse
    {
        $data = $request->all();
        $category = Category::create($data);  
        
        return $this->success(new CategoryResource($category), JsonResponse::HTTP_CREATED);

    }

  
    public function show(string $id)
    {
        $category = Category::find($id);
        return $this->success(new CategoryResource($category), JsonResponse::HTTP_OK);

    }

   
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);

        $category->update($data);
        return $this->success(new CategoryResource($category), JsonResponse::HTTP_OK);

    }

    
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete($category);

        return $this->success([], JsonResponse::HTTP_OK);

    }
}