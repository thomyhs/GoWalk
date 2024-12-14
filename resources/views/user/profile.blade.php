@extends('layouts.app')
@section('section')

    <div class="pt-10 mt-10">

        <h1 class="font-bold text-2xl p-5">Update Data</h1>

        <form action="{{ route('profile.submit', Auth::user()->id) }}" method="POST" class="mb-8 bg-white p-6 rounded-lg shadow">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input type="text" name="username" id="username" value="{{Auth::user()->username}}" class="shadow border rounded w-full py-2 px-3" required></input>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input type="email" name="email" id="email" value="{{Auth::user()->email}}" class="shadow border rounded w-full py-2 px-3" required></input>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input type="password" name="password" id="password" value="{{Auth::user()->password}}" class="shadow border rounded w-full py-2 px-3" placeholder="Input New Password" required></input>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                Update
            </button>
        </form>
    </div>
@endsection