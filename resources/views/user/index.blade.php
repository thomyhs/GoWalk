@extends('layouts.app')
@section('section')
    <div class="mt-10">
        <img src="/image/homeGw.jpg" alt="" srcset="">
    </div>

    <div class="w-full h-full ">
        @if(session('message'))
            <div class="text-red-800 text-center mt-2">
                {{session('message')}}
            </div>
        @endsession
        <div class="grid grid-cols-3 gap-10 py-10 px-5">
            @foreach($categories as $category)
                <div class="h-fit w-full justify-items-center">
                    <a href="{{route('user.show', $category->slug)}}">
                        <div class=" w-full justify-items-center">
                            <img src="/image/icon/{{$category->icon}}" alt="nongkrong" width="40px">
                            <span class="text-black font-semibold text-sm">{{$category->name}}</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection