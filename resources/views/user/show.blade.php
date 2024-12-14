@extends('layouts.app')
@section('section')

<div class="mt-[70px]">
    <div class="bg-white rounded-lg shadow p-4">
        <button type="submit" class="mb-2 flex justify-start w-fit py-1 px-3 rounded-md bg-yellow-500 font-bold" onclick="window.history.go(-1)"> < Back</button>
        <h2 class="text-2xl font-bold">{{ $category->name }}</h2>
        
        @if($posts->count() > 0)
            {{-- <div class="space-y-6">
                    <div class="border-b pb-4 last:border-b-0">
                        <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
                        <p class="text-gray-600">{{ $post->description }}</p>
                    </div>
                @endforeach
            </div> --}}


            <div class="mx-2 ">
                <div class="grid grid-cols-2 gap-3 py-5 px-5 w-full ">
                    @foreach ($category->posts as $post)
                        <a href="{{route('user.detail', ['slug' => $category->slug, 'id' => $post->id])}}">
                            <div class="p-3 flex flex-col rounded-md shadow-2xl">
                                <div class=" rounded-md ">
                                    <img src="/image/{{$post->imagePath}}" class="w-full rounded-md h-[120px]  aspect-square object-cover">
                                </div>
                                <span class="my-3 text-lg font-semibold">{{$post->title}}</span>
                                <span class="my-3 text-sm text-gray-900/50 text-end">{{$category->name}}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Pagination --}}
            {{-- @if ($post->hasPages())
                <div class="mt-6">
                    {{ $post->links() }}
                </div>
            @endif --}}
        @else
            <div class="container h-[50s] mx-auto translate-y-1/2">
                <p class="text-gray-600 text-center">No content found in this category.</p>
            </div>
        @endif
    </div>
</div>
@endsection