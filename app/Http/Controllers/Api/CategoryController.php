<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->save();

            return response()->json($category);
        } catch (\Throwable $th) {
            return response()->json([
                "error"=> $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $category = Category::find($id);
            return response()->json($category);
        } catch (\Throwable $th) {
            return response()->json([
                "error"=> $th->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $category = Category::find($id);

            $category->name = $request->name;
            $category->update();

            return response()->json($category);
        } catch (\Throwable $th) {
            return response()->json([
                "error"=> $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::find($id);
            $category->delete();

            return response()->json(['message' => 'success!']);
        } catch (\Throwable $th) {
            return response()->json([
                "error"=> $th->getMessage()
            ], $th->getCode());
        }
    }
}
