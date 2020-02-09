<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['view', 'index']);
    }

    /**
     * Show the blog.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();
        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * Show the post.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function view(Request $request)
    {

        return view('blog.post', compact($post));
    }

    /**
     * Show the add post page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addPost()
    {
        return view('blog.add');
    }

    /**
     * Create a new post instance.
     *
     * @param Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Validate the request...
        $this->validate($request, [
            'title'     => 'required',
            'content'     => 'required',
        ]);

        $slug = str_slug($request->title);

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $slug;
        $post->content = $request->content;
        $post->user_id =Auth::id();

        $post->save();

        return redirect()->route('blog.index')->with('status', 'Article ajouté au blog !');;
    }


}
