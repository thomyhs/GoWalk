<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class ReviewController extends Controller
{


    public function addReviews(Request $request, string $id, Review $review)
    {

        // $category = Category::with('posts')->where('slug', $slug)->firstOrFail();
        $user = Auth::user();
        $post = Post::where('id', $id)->firstOrFail();
        $reviews = Review::with('users', 'posts')->get();
        
        // $post->reviews = $reviews;

        $limitReview = Review::where('users_id', $user->id)->where('posts_id', $post->id)->first();
        if($limitReview){
            return redirect()->back()->with('message', 'Maaf kamu sudah menambahkan review :(');
        }else{
            
                    $validated = $request->validate([
                        'rating' => 'required|integer|min:1|max:5',
                        'review' => 'required|string|min:10',
                    ]);
            
                    $review = new Review([
                        'users_id' => $user->id,
                        'posts_id' => $post->id,
                        'rating' => $validated['rating'],
                        'review' => $validated['review'],
                    ]);
            
                    $review->save();
                    // dd($review);

                    return redirect()->back()->with('success', 'Review berhasil ditambahkan!');
        }


        // return dd($review);
        // return view('review.submit', ["post" => $reviews], compact('post', 'reviews', 'review'));
    }

    public function index(string $slug, $id)
    {
        // $category = Category::where('slug', $slug)->get();
        // $posts = Post::where("id", $id)->get();

        
        // $reviews = $posts->reviews()->with('user');
        // $averageRating = $posts->reviews()->avg('rating');
        // $category->posts = $posts;
        
        // return view('user.detail', ["category" => $posts], compact('reviews', 'averageRating', 'posts'));

    }

    public function ratings($post){
        $reviews = Review::with(['user', 'post'])->get()->toArray();
        // dd($reviews);
        return view('user.detail', compact('reviews', 'post'));
    }
}
