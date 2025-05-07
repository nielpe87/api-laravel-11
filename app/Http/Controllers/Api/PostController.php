<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(50);

        return response()->json($posts);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try {

            DB::beginTransaction();

            $user = Auth::user();

            $post = new Post();
            $post->comment = $request->comment;
            $post->status = $request->status;
            $post->user_id = $user->id;
            $post->save();

            $post->categories()->sync($request->categories);

            $data = Post::with('categories')->find($post->id);
            DB::commit();

            return response()->json($data, 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $post = Post::find($id);
            $post->comment = $request->comment;
            $post->status = $request->status;
            $post->user_id = $user->id;
            $post->save();

            $post->categories()->sync($request->categories);

            $data = Post::with('categories')->find($post->id);
            DB::commit();

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $post = Post::find($id);
            $post->delete();

            return response()->json();
        } catch (\Throwable $th) {
            $response = [
                "error" => "Erro tente novamente",
                "code" => 39998732,
            ];
            return response()->json($response, 500);
        }
    }
}
