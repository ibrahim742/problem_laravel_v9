<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Storage::get('post.txt');
        // $posts = explode("\n", $posts);

        // $view_data = [
        //     'posts' => $posts
        // ];

        // "SELECT title, content FROM posts"

        // $posts = DB::table('posts')
        //     ->select('id', 'title', 'content', 'created_at')
        //     ->where('active', true)
        //     ->get();

        $posts = Post::active()->get();
        $view_data = [
            'posts' => $posts,
        ];

        return view('posts.index', $view_data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        // $posts = Storage::get('post.txt');
        // $posts = explode("\n", $posts);

        // $new_post = [
        //     count($posts) + 1,
        //     $title,
        //     $content,
        //     date('Y-m-d H:i:s')
        // ];
        // $new_post = implode(',', $new_post);

        // array_push($posts, $new_post);
        // $posts = implode("\n", $posts);

        // Storage::write('post.txt', $posts);

        Post::insert([
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // // echo "Halaman detail dari post. ID: $id";
        // $posts = Storage::get('post.txt');
        // $posts = explode("\n", $posts);
        // $selected_post = array();
        // foreach ($posts as $post) {
        //     $post = explode(",", $post);
        //     if ($post[0] == $id); {
        //         $selected_post = $post;
        //     }
        // }

        // $view_data = [
        //     'post' => $selected_post
        // ];

        $post = Post::where('id', '=', "$id")->first();
        $comments = $post->comments()->limit(2)->get();

        $view_data = [
            'post'     => $post,
            'comments' => $comments,
        ];

        return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::where('id', '=', "$id")->first();

        $view_data = [
            'post' => $post
        ];


        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        Post::where('id', '=', "$id")
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        return redirect("posts/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', "$id")->delete();

        return redirect('posts');
    }
}
