<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();

        // maniera differente di scrivere quella sopra
        // $posts = DB::table('posts')->get();

        $posts = DB::table('posts')
        ->select(
            'posts.id',
            'posts.title',
            'posts.content',
            'posts.slug',
            'posts.created_at as date',
            'categories.name as category'
        )
        ->join('categories','posts.category_id','categories.id')
        ->paginate(3);

        // è possibile fare le join in questo modo
        // con with si passa la proprietà della join presente nel Model
        // il risultato sono una serie di elementi annidati
        // $posts = Post::with(['category','tags'])->paginate(3);

        return response()->json($posts);
    }



    public function show($slug)
    {
        $post = Post::where('slug',$slug)->with(['category', 'tags'])->first();
        if($post){
            $data = [
                'success' => true,
                'data' => $post
            ];
            return response()->json($data);
        }
        return response()->json(['success' => false]);
    }


}
