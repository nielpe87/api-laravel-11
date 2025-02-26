<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        echo "Lista de posts";
    }

    public function store(Request $request){
        return $request->all();
    }

    public function create(){
        return view('posts.create');
    }

    public function edit($id){
        echo "O id $id";
    }
}
