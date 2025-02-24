<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Builder;

class BlogController extends Controller
{

    public function __construct()
    {
        Inertia::setRootView('blog'); //nak cari view blog.blade instead of app.blade
    }

    public function index() //index vue
    {
        $posts = Post::activePost()
        ->with('user:id,name')
        ->with('categories:slug,name')->get(); //post dgn user data
       //dd($posts);
        return Inertia::render('Blog/Index',['posts' => $posts]);
    }

    public function show($slug) //show vue
    {
       $post = Post::activePost()
                ->with('user:id,name')
                ->with('categories:slug,name')
                ->with('tags:slug,name')
                ->where('slug',$slug)
                ->firstOrFail();

      //  return $post;

        //best practice, lepas dah query return je dkt browser nak tgok data keluar tak.

        // return  [
        //         'post' => $post,
        //         'nextPost' =>$post->next_post,
        //         'prevPost' =>$post->prev_post,
        // ];

      //  ni nak return dkt vue , dkt prop     
         
        return Inertia::render('Blog/Show',[
        'post' => $post,
        'nextPost' =>$post->next_post,
        'prevPost' =>$post->prev_post,
        ]);
    }

    public function user($userId)
    {
        $posts = Post::activePost()
        ->where('user_id',$userId)
        ->with('user:id,name')
        ->with('categories:slug,name')->get();

        return Inertia::render('Blog/Index',['posts' => $posts]);
    }

    public function category($slug)
    {
        $posts = Post::activePost()
        ->whereHas('categories',function (Builder $query) use($slug) {
            $query->where('slug',$slug);
        })
        ->with('user:id,name')
        ->with('categories:slug,name')->get(); //post dgn user data
       //dd($posts);
        return Inertia::render('Blog/Index',['posts' => $posts]);
    }

    public function tag($slug)
    {
        $posts = Post::activePost()
        ->whereHas('tags',function (Builder $query) use($slug) {
            $query->where('slug',$slug);
        })
        ->with('user:id,name')
        ->with('categories:slug,name')->get(); 
    
        return Inertia::render('Blog/Index',['posts' => $posts]);
    }
}
