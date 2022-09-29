<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }
    //Para un controlador que solo tenga un metodo, puedes utilizar __invoke en lugar de index
    public function __invoke() 
    {

        //Obtener seguidores

        $ids = auth()->user()->following->pluck('id')->toArray();

        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', [
            'posts' => $posts
        ]);
    }
}