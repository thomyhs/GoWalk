@extends('layouts.app')
@section('section')

<link rel="stylesheet" href="/css/ratings.css">


<div class="mt-12 mx-2">
    <div class="flex flex-col gap-3">
        <button type="submit" class="mt-10 flex justify-start w-fit py-1 px-3 rounded-md bg-yellow-500 font-bold" onclick="window.history.go(-1)"> < Back</button>
        <div class="justify-items-center container mx-auto pt-5 object-cover">
            <img src="{{asset('image/'.$post->imagePath)}}" alt="{{$post->title}}" class="h-64 rounded-lg object-cover ">
        </div>
        {{-- @foreach ($post as $pos) --}}
        <div class=" flex items-center justify-between mx-4 mt-3">
                <div>
                    <h1 class="font-bold text-2xl">{{$post->title}}</h1>
                </div>
                
                <div class="flex text-xl">
                    <img src="/image/star-icon.png" class="h-7">
                    <p>{{ number_format($averageRating, 1) }}</p>
                </div>
            </div>
            {{-- <div>
                <p class="font-semibold text-lg">Description :</p>
                <div class="bg-slate-300 p-2 rounded-md">
                    <p class="font-normal text-base ">{{$post->description}}</p>
                </div>
            </div> --}}
            <div>
                <p class="font-semibold text-lg">Location :</p>
                <div class="bg-slate-300 p-2 rounded-md">
                    <a href="{{$post->location}}" class="font-normal text-base">{{$post->locationTitle}}</a>
                </div>
            </div>
            
        {{-- @endforeach --}}

        

        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-4">Reviews for {{ $post->title }}</h2>
    
            <!-- Daftar Review -->
            <div class=" grid grid-cols-2 gap-4 ">
                @foreach ($reviews as $review)
                    <div class=" p-4 rounded-lg shadow-2xl box-border aspect-square bg-white/75">
                        <div class="flex w-full justify-end">
                            <span class="text-yellow-400 text-xl">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </span>
                        </div>
                        <div class=" text-left">
                            <div>
                                <p class="font-bold">{{ $review->users->username }}</p>
                            </div>
                        </div>
                        <div class="whitespace-pre-line">
                            <p class="text-gray-700 word-wrap break-words">{{ $review->review }}</p>
                        </div>
                        <p class="text-gray-500 text-xs text-end">{{ $review->created_at->format('d M Y') }}</p>

                    </div>
                 @endforeach 
                </div>

                
                {{-- @foreach ($post as $pos) --}}
                        
                    <form action="{{route('review.submit', $post->id)}}" method="POST" class="my-8 bg-white/50 p-6 rounded-lg shadow-xl">
                        @csrf
                        <div class="mb-4 flex flex-col">
                            @if(session('message'))
                                <div class="text-red-800">
                                    {{session('message')}}
                                </div>
                            @endsession
                            <input type="hidden" name="users_id" value="{{Auth::user()->username}}">
                            
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">
                                Rating
                            </label>
                            {{-- <select name="rating" id="rating" class="shadow border rounded w-full py-2 px-3" required> --}}
                                <div class="flex justify-start">
                                    <div class="rate transition-all">
                                        <input type="radio" id="star5" name="rating" value="5" required />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rating" value="4" required />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rating" value="3" required />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rating" value="2" required />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rating" value="1" required />
                                        <label for="star1" title="text">1 star</label>
                                      </div>
                                </div>
                            {{-- </select> --}}
                        </div>
                
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="review">
                                Your Review
                            </label>
                            <textarea
                                name="review"
                                id="review"
                                rows="4"
                                class="shadow border rounded w-full py-2 px-3"
                                required
                                minlength="10"
                            ></textarea>
                        </div>
                
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                            Submit Review
                        </button>
                    </form>
                {{-- @endforeach --}}
               
        </div>
    </div>
</div>
@endsection