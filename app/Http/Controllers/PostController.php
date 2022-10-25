<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class PostController extends Controller
{

    // public $search, $category='all';
    // use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    // public function loadCategory() {
    //     $query = Category::orderBy('created_at', 'desc')
    //         ->search($this->search);

    //    if($this->category!='all') {
    //     $query->where('category', $this->category);
    //    }

    //    $categories = $query->paginate(4);

    //    return  compact('categories');
    // }

    public function all(Request $request)
    {
        $posts = Post::where([
            ['created_at', '!=' , null],[
                function($query) use($request){
                    if(($post = $request->post)){
                        $query->orWhere('post', 'LIKE' ,  '%' . $post . '%')
                       ->orWhere('category_id', 'LIKE' ,  '%' . $post . '%')
                        ->get();
                    }
                }
            ]
        ])->orderBy('created_at', 'desc')->simplePaginate(6);
        return view('pages.home', compact('posts'),['posts'=>$posts]);
    }

    public function byCategory(Category $category)
    {   
        $posts = Post::where('category_id', $category->id)->orderBy('created_at', 'desc')->simplePaginate(6);
        return view('pages.category', compact('posts', 'category'));
    }

    public function byAuthor(User $author)
    {
        $posts = Post::where('user_id', $author->id)->orderBy('created_at', 'desc')->simplePaginate(6);
        return view('pages.author', compact('posts', 'author'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('category');
        return view('pages.users.create-post', compact('categories'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'   =>  'required',
            'post'          =>  'required|string|max:255'
        ]);
        Post::create($request->all());
        // return back()->with('status', 'Post published successfully.');
        return redirect('home')->with('status', 'Post published successfully.');
    }
}
