<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
            
        return view('user.index', compact('categories'));
        
    }

    public function postCategory(string $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(10);
        
        return view('user.show', compact('categories', 'category', 'posts'));
    }

    public function detailPost(string $slug,$id, Review $reviews)
    {

        $user = Auth::user();
        
        $category = Category::where('slug', $slug)->get();
        $post = Post::findOrFail($id);
        
        $reviews = Review::where('posts_id', $post->id)->with('users', 'posts')->get();
        // dd($limitReview);
        
        $averageRating = $reviews->avg('rating');
        
        $category->post = $post;
        // $limitReview = Review::where('users_id', $user->id)->where('posts_id', $post->id)->first();

        
        return view('user.detail', ["category" => $post], compact('post', 'reviews', 'averageRating', ));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
